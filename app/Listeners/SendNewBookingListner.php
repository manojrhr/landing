<?php

namespace App\Listeners;

use App\Events\NewBookingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Admin;
use Notification;
use App\Notifications\NewBookingAdminNotification;

class SendNewBookingListner
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
     * @param  NewBookingEvent  $event
     * @return void
     */
    public function handle(NewBookingEvent $event)
    {
        $admins = Admin::all();
        $when = \Carbon\Carbon::now()->addSeconds(10);

        // $user->notify((new Notification($notification))
        Notification::send($admins, 
            (new NewBookingAdminNotification($event->booking))->delay($when)
        );
    }
}
