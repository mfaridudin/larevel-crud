<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Socialite\Socialite;

class GoogleAuthController extends Controller
{
    public function google_redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
        $google_user = Socialite::driver('google')->stateless()->user();

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
    }
}
