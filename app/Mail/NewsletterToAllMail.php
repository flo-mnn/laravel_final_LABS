<?php

namespace App\Mail;

use App\Models\ContactEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewsletterToAllMail extends Mailable
{
    use Queueable, SerializesModels;
    public $newsletter;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content)
    {
        $this->newsletter = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.newsletter')->subject(config('app.name')."'s newsletter")->from(ContactEmail::first()->email, config('app.name')."'s Team");
    }
}
