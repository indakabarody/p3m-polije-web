<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;

class CustomResetPassword extends ResetPassword
{
    /**
     * Create a notification instance.
     *
     * @param  string  $token
     * @return void
     */
    public function __construct($token, $userType)
    {
        $this->token = $token;
        $this->userType = $userType;
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }

        if (static::$createUrlCallback) {
            $url = call_user_func(static::$createUrlCallback, $notifiable, $this->token);
        } else {
            switch ($this->userType) {
                case 'admin':
                    $url = url(route('admin.password.reset', [
                        'token' => $this->token,
                        'email' => $notifiable->getEmailForPasswordReset(),
                    ], false));
                    break;

                case 'staff':
                    $url = url(route('staff.password.reset', [
                        'token' => $this->token,
                        'email' => $notifiable->getEmailForPasswordReset(),
                    ], false));
                    break;

                case 'customer':
                    $url = url(route('customer.password.reset', [
                        'token' => $this->token,
                        'email' => $notifiable->getEmailForPasswordReset(),
                    ], false));
                    break;

                default:
                    $url = url(route('password.reset', [
                        'token' => $this->token,
                        'email' => $notifiable->getEmailForPasswordReset(),
                    ], false));
                    break;
            }
        }

        return $this->buildMailMessage($url);
    }
}
