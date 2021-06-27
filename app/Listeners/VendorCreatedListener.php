<?php

namespace App\Listeners;

use App\Events\VendorCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VendorCreatedListener
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
    public function handle(VendorCreatedEvent $event)
    {
        //
    }
}
