<?php

namespace App\Http\Controllers;

use App\Client;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Events\SendEmailFromContactPageEvent;
use App\Http\Requests\Email\ProductContactFormRequest;


class SendEmailController extends Controller
{
   
	public function sendmail(ProductContactFormRequest $request, Client $client)
	{

    	if (!$client::where('email', $request->email)->exists()) {
    		$client->fill($request->only('name', 'email', 'phone'));
    		$client->save();
    	}

		$details = $request->only('name', 'subject', 'agent', 'phone', 'email', 'message_body', 'product');

		event(new SendEmailFromContactPageEvent($details));

	}



}
