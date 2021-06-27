<?php

namespace App\Listeners;

use App\Events\RegisteredUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendEmailVerificationNotification;

use Notification;

class EmailVerificationListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RegisteredUserEvent  $event
     * @return void
     */
    public function handle(RegisteredUserEvent $event)
    {
        //Here we send email verification link to user
       
        //Notification::send($event->user, new SendEmailVerificationNotification);
       
        $event->user->notify(new SendEmailVerificationNotification($event->user));
        
    }
}
