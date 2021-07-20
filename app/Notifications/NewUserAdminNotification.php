<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
use Log;

class NewUserAdminNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
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
        Log::info('Admin user notification is sent..');
        if($user->delivery_guy){
            return (new MailMessage)
            ->line('New Delivery guy is registered on your website.')
            ->line('Please activate him from admin panel, in order to allow him to work on our plateform.')
            ->line('Guy Name: '.$this->user->name)
            ->action('See Deails', url('/admin/delivery-guy'));
        }else{
            return (new MailMessage)
                ->line('New User registered on your website.')
                ->line('User Name: '.$this->user->name)
                ->action('See Deails', url('/admin/users'));
        }
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
            'message' => $this->user->name." has registered on SkiSki",
            'link' => '/admin/user/'.$this->user->id,
            'icon' => 'fa fa-user text-aqua',
        ];
    }
}
