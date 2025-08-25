<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AdminLoginAccessNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
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
                    ->subject('Pemberitahuan Akses Login ' . config('app.name'))
                    ->greeting('Yth. Admin '  . config('app.name'))
                    ->line('Anda telah didaftarkan sebagai admin di website ' .  config('app.name') . '. Berikut akses akun Anda:')
                    ->line('Email: ' . $this->email)
                    ->line('Kata Sandi: ' . $this->password)
                    ->action('Login dan Ubah Kata Sandi', route('admin.change-password.index'))
                    ->line('Silakan melakukan login dan mengganti kata sandi.');
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
