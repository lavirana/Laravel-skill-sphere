<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\MessageSenderInterface;
use App\Services\SmsSender;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MessageSenderInterface::class, SmsSender::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
