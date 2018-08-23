<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    public $subject, $name, $email, $phone, $message_body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $name, $email, $phone, $message_body)
    {
        $this->subject = $subject;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message_body = $message_body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->cc(env('MAIL_FROM_ADDRESS'))
        ->with([
        	'name' => $this->name,
        	'email' => $this->email,
        	'phone' => $this->phone,
        	'message_body' => $this->message_body
        ])
        ->markdown('emails.contact.contact');
    }
}
