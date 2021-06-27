<?php

namespace App\Listeners;

use App\Events\RefreshedUserTokenEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\RefreshedUserTokenNotification;


class RefreshedUserTokenListener
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
     * @param  RefreshedUserTokenEvent  $event
     * @return void
     */
    public function handle(RefreshedUserTokenEvent $event)
    {
        //Notification::send($event->user, new SendEmailVerificationNotification)     ;
       
        $event->user->notify(new RefreshedUserTokenNotification($event));
    }
}
