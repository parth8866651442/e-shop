<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommonMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $view;
    public $subject;
    public $logo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($view, $data, $subject)
    {
        $this->data = $data;
        $this->view = $view;
        $this->subject = $subject;
        $this->logo = asset('user/images/logo_2.png');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view)
            ->subject($this->subject);
    }
}
