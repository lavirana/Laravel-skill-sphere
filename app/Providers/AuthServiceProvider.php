<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::define('view-finance', function ($user) {
            return in_array($user->role, ['admin', 'super_admin', 'finance']);
        });
        Gate::define('view-downloads', function ($user) {
            return in_array($user->role, ['admin', 'super_admin', 'sales']);
        });
        Gate::define('view-manage-users', function ($user) {
            return in_array($user->role, ['admin', 'super_admin']);
        });
    }
}
