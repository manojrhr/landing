<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Booking;

class NewBookingUserNotification extends Notification
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
        return ['mail'];
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
                    ->subject('New Booking Received on Ski Ski')
                    ->line("New Booking received for ".$this->booking->jetski->title)
                    ->line("By User ".$this->booking->user->name)
                    ->line("For Date ".date('F j, Y', strtotime($this->booking->checkin_date)) ."-". date('g:i A', strtotime($this->booking->pickup_time)) )
                    ->action('See Details', route('user.seller.bookings'));
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
            //
        ];
    }
}
