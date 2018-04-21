<?php

namespace App\Mail;

use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ClientProductContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sender, $name, $product, $phone, $message_body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender, $name, $phone, Product $product, $message_body)
    {
        $this->sender = $sender;
        $this->name = $name;
        $this->product = $product;
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
        return $this
            ->subject("Contact form Cape Tillers website")
            ->from($this->sender)
            ->with([
                'email' => $this->sender,
                'name' => $this->name,
                'phone' => $this->phone,
                'message_body' => $this->message_body
            ])
            ->markdown('emails.product.contact');
    }
}
