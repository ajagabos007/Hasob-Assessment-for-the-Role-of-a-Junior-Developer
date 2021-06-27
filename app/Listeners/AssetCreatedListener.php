<?php

namespace App\Listeners;

use App\Events\AssetCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AssetCreatedListener
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
     * @param  AssetCreatedEvent  $event
     * @return void
     */
    public function handle(AssetCreatedEvent $event)
    {
        //
    }
}
