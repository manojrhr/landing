<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\NewUserAdminNotification;
use Notification;
use App\Admin;

class SendNewUserAdminNotification
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admins = Admin::all();    
        Notification::send($admins, new NewUserAdminNotification($event->user));
    }
}
