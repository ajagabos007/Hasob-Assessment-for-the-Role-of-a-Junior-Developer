<?php

namespace App\Listeners;

use App\Events\AssetAssignmentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendAssetAssignmentNotification;


class AssetAssignmentListener
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
     * @param  AssetAssignmentEvent  $event
     * @return void
     */
    public function handle(AssetAssignmentEvent $event)
    {
         //Notification::send($event->user, new SendAssetAssignmentNotification);
        // dd($event->assetAssignment->assigned_user());
         $event->assetAssignment->assigned_user()->notify(new SendAssetAssignmentNotification($event->user));
    }
}
