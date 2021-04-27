<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\JetSki;

class NewJetSkiAdminNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $jetski;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(JetSki $jetski)
    {
        $this->jetski = $jetski;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('New Ski Jet is added by '.$this->jetski->user->name)
                    ->action('See Details', url('/admin/jetski'));
                    // ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => "New Ski Jet is added by ".$this->jetski->user->name,
            'link' => '#',
            'icon' => 'fa fa-ship text-green',
        ];
    }
}
