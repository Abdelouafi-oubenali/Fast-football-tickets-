<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('is-admin', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('is-organisateur', function (User $user) {
            return $user->role === 'organisateur';
        });

        Gate::define('is-user', function (User $user) {
            return $user->role === 'client';
        });
        
    }
}
