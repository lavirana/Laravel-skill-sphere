<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\StringHelper;
use App\Helpers\MathHelper;

class HelperServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(\App\Helpers\StringHelper::class, function () {
            return new \App\Helpers\StringHelper();
        });
        $this->app->singleton(\App\Helpers\MathHelper::class, function () {
            return new \App\Helpers\MathHelper();
        });

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
