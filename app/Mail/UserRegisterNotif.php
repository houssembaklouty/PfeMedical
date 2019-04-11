<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisterNotif extends Mailable
{
    use Queueable, SerializesModels;

    public $first_name;
    public $email;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($first_name, $email, $password)
    {
        $this->first_name = $first_name;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {        
        return $this->from('mail@pfe.com')
                    ->subject('Your login + paswword')
                    ->markdown('emails.register.users');
    }
}

