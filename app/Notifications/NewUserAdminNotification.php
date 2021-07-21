<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
use Log;

class NewUserAdminNotification extends Notification
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
        Log::info('Admin notification');
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
        if($this->user->delivery_guy){
            return (new MailMessage)
                ->subject('Amaze - Admin a new deliery guy registered our platform')
                ->line('New Delivery guy is registered on your website.')
                ->line('Please activate him from admin panel, in order to allow him to work on our plateform.')
                ->line('Delivery Guy Name: '.$this->user->name)
                ->line('Phone Number: '.$this->user->phone)
                ->action('See Deails', url('/admin/delivery-guy'));
        }else{
            return (new MailMessage)
                ->subject('Amaze - Admin a new customer registered our platform')
                ->line('New Customer registered on your website.')
                ->line('Customer Name: '.$this->user->name)
                ->line('Phone Number: '.$this->user->phone)
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
            'message' => $this->user->name." has registered on Amaze",
            'link' => '/admin/user/'.$this->user->id,
            'icon' => 'fa fa-user text-aqua',
        ];
    }
}
