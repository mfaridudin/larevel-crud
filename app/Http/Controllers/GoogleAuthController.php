<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Socialite;

class GoogleAuthController extends Controller
{
    public function google_redirect(Request $request)
    {
        return Socialite::driver('google')
            ->stateless()
            ->with([
                'state' => $request->get('type'), // spa
            ])
            ->redirect();
    }

    public function google_callback(Request $request)
    {
        $googleUser = Socialite::driver('google')
            ->stateless()
            ->user();

        $user = User::updateOrCreate(
            ['email' => $googleUser->email],
            [
                'name' => $googleUser->name,
                'google_id' => $googleUser->id,
                'avatar' => $googleUser->avatar,
                'password' => Hash::make(uniqid()),
                'email_verified_at' => now(),
            ]
        );

        if ($request->get('state') === 'spa') {
            $token = $user->createToken('google-token')->plainTextToken;

            return redirect(
                config('app.frontend_url').'/google-callback?token='.$token
            );
        }

        if ($request->get('state') === 'next') {
            $token = $user->createToken('google-token')->plainTextToken;

            return redirect(
                config('app.nextjs_url').'/google-callback?token='.$token
            );
        }

        Auth::login($user);

        return redirect('/siswa');
    }
}
