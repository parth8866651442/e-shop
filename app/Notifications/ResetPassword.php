<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPassword extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {   
        $url = url('password/reset', $this->token).'?email='.$notifiable->email;

        return (new MailMessage)
            ->view('mail.html.reset_password',['name'=>$notifiable->name,'email' => $notifiable->email ,'url' => $url])
            ->subject('Reset Password Notification');
    }
}