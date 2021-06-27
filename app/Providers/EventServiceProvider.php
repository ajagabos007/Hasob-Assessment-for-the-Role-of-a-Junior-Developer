<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

use App\Events\RegisteredUserEvent;
use App\Listeners\EmailVerificationListener;
use App\Listeners\RegisteredUserListener;

use App\Events\RefreshedUserTokenEvent;
use App\Listeners\RefreshedUserTokenListener;

use App\Events\AssetCreatedEvent;
use App\Listeners\AssetCreatedListener;

use App\Events\VendorCreatedEvent;
use App\Listeners\VendorCreatedListener;

use App\Events\AssetAssignmentEvent;
use App\Listeners\AssetAssignmentListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        RegisteredUserEvent::class => [
            EmailVerificationListener::class,
            RegisteredUserListener::class
        ],

        RefreshedUserTokenEvent::class => [
            RefreshedUserTokenListener::class,
        ],

        AssetCreatedEvent::class=>[
            AssetCreatedListener::class,
        ],

        VendorCreatedEvent::class=>[
            VendorCreatedListener::class,
        ],

        AssetAssignmentEvent::class=>[
            AssetAssignmentListener::class,
        ]
        

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
