<?php

namespace App\Providers;

use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        ResetPassword::createUrlUsing(function ($user, string $token) {

            /**
             * ============================
             * API → React (Vite / SPA)
             * ============================
             */
            if (request()->is('api/*') && request()->get('app') === 'react') {
                return config('app.frontend_url')
                    ."/reset-password/{$token}?email="
                    .urlencode($user->email);
            }

            /**
             * ============================
             * API → Next.js
             * ============================
             */
            if (request()->is('api/*') && request()->get('app') === 'next') {
                return config('app.nextjs_url')
                    ."/reset-password/{$token}?email="
                    .urlencode($user->email);
            }

            /**
             * ============================
             * Blade (Laravel Web)
             * ============================
             */
            return url(
                '/reset-password/'.$token.
                '?email='.urlencode($user->email)
            );
        });
    }
}
