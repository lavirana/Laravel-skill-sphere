<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifyUsersOfPost implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostPublished $event): void
    {
       
        $all_user = User::select('id', 'name', 'email')->limit(2)->get();

        foreach($all_user as $users){
           Mail::raw("Hello {$users->name} check out our new post: {$event->post->title}",function($message) use ($users){
               $message->to($users->email)
               ->subject('New Blog Post Notification');
        });
        }
    }
}
