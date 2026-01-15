<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleAuthController extends Controller
{
    public function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
        $google_user = Socialite::driver('google')->user();
        $user = User::where('email', $google_user->getEmail())->first();
        if (! $user) {
            $user = User::create([
                'name' => $google_user->getName(),
                'email' => $google_user->getEmail(),
                'password' => Hash::make(Str::random(24)),
            ]);
        }

        Auth::login($user);

        return redirect('/siswa');

        // dd($google_user);
    }
}
