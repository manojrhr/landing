<?php

namespace App\Listeners;

use App\Events\NewJetSkiAddedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewJetSkiAdminNotification;
use App\Admin;
use Notification;

class SendNewJetSkiAdminNotification
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
     * @param  NewJetSkiAddedEvent  $event
     * @return void
     */
    public function handle(NewJetSkiAddedEvent $event)
    {
        $admins = Admin::all();
        $when = \Carbon\Carbon::now()->addSeconds(10);

        // $user->notify((new Notification($notification))
        Notification::send($admins, 
            (new NewJetSkiAdminNotification($event->jetski))->delay($when)
        );
    }
}
