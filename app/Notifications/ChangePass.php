<?php

namespace App\Notifications;

use Illuminate\Support\Facades\URL;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ChangePass extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    //public $url;
    public function __construct()
    {
       // $this-> url = $url;
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
        $url = URL::temporarySignedRoute('teste', now()->addMinutes(5), [
            'email' => 'andreteixeira.csn@gmail.com'
        ]);
        $name = 'André';

        return (new MailMessage)
                    ->greeting('Olá '.$name)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', $url)
                    ->line('Thank you for using our application!');
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
