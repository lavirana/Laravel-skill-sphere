<?php

namespace App\Observers;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserObserver
{
    public function created(User $user)
    {
        Log::info('New user registered: ' . $user->email);
    }

    public function updated(User $user)
    {
        Log::info('User updated: ' . $user->email);
    }
}
