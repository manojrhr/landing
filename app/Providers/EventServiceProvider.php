<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\NewUserRegisteredEvent;
use App\Events\NewJetSkiAddedEvent;
use App\Events\NewBookingEvent;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NewUserRegisteredEvent::class => [
            \App\Listeners\SendNewUserAdminNotification::class,
        ],
        NewJetSkiAddedEvent::class => [
            \App\Listeners\SendNewJetSkiAdminNotification::class,
        ],
        NewBookingEvent::class => [
            \App\Listeners\SendNewBookingListner::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
