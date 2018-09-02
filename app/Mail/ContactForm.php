<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactForm extends Mailable
{
	use Queueable, SerializesModels;

	public $subject, $name, $email, $phone, $message_body, $product, $admin_name, $admin_email;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($event)
	{
		$this->subject = $event->details['subject'];
		$this->name = $event->details['name'];
		$this->email = $event->details['email'];
		$this->phone = $event->details['phone'];
		$this->message_body = $event->details['message_body'];
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->subject($this->subject)
			->cc(config('mail.from.address'))
			->with([
				'subject' => $this->subject,
				'name' => $this->name,
				'email' => $this->email,
				'phone' => $this->phone,
				'message_body' => $this->message_body,
			])
			->markdown('emails.contact.contact');
	}
}
