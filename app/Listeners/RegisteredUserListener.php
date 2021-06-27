<?php

namespace App\Listeners;

use App\Events\RegisteredUserEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendRegisteredUserNotification;

class RegisteredUserListener
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
        //Notification::send($event->user, new SendRegisteredUserNotification);
       
        $event->user->notify(new SendRegisteredUserNotification($event->user));
    }
}
