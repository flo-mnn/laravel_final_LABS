<?php

namespace App\Mail;

use App\Models\ContactEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisteredMail extends Mailable
{
    use Queueable, SerializesModels;
    public $registered;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($registered)
    {
        $this->registered = $registered;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.registered')->subject('Welcome'.$this->registered['name'])->from(ContactEmail::first()->email,config('app.name'));
    }
}
