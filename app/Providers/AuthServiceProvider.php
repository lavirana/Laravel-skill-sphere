<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

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
        Gate::define('edit-post',function($user, $post){
            return $user->id === $post->user_id;
        });
    }
}
