<?php

namespace App\Listeners;

use App\Mail\VerifyEmail;
use App\Models\User;
use App\Notifications\NotifyAdmin;
use App\Notifications\VerifyEmail as NotificationsVerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserCreatedListener 
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $event->user->notify(new NotificationsVerifyEmail($event->user));
        $admin= User::find(59);
        $admin->notify(new NotifyAdmin($event->user));

    //    $email= $event->user->email;
    //    Mail::to($email)->send(new VerifyEmail($event->user));
    }
}
