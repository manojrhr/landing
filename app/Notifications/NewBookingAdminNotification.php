<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Booking;

class NewBookingAdminNotification extends Notification
{
    use Queueable;

    protected $booking;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
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
                    ->line("New Booking received for <b>".$this->booking->jetski->title."</b>")
                    ->line("By User <b>".$this->booking->user->name."</b>")
                    ->line("For Date <b>".$this->booking->date.' | '.$this->booking->time."</b>")
                    ->action('See Details', url('/admin/'));
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
            'message' => "New Booking received for ".$this->booking->jetski->title,
            'link' => '#',
            'icon' => 'fa fa-shopping-cart text-green',
        ];
    }
}
