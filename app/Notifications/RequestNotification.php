<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class RequestNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($num)
    {
        $this->num = $num;
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
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
            ->subject('Inicio de sesión sospechoso')
            ->greeting('Hola ' . $notifiable->name)
            ->line('Hubo un inicio de sesión sospechoso!')
            ->line('Si no fuiste vos, entra a tu perfil para cambiar tu clave')
            ->action('Cambiar Clave', 'https://laravel.com')
            ->line('Gracias por usar nuestra aplicación!')->error();

    //         return (new MailMessage)->view(
    //     'emails.name', ['invoice' => $this->invoice]
    // );
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

    public function toDatabase($notifiable)
    {
        return [
            'num' => $this->num,
            'user' => 'USER'
        ];
    }
}
