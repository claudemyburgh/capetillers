<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Http\Requests\Email\ProductContactFormRequest;
use App\Mail\ContactForm;
use Illuminate\Http\Request;
use Mail;

class PagesController extends Controller
{
	  
	public function index(Category $categories)
	{
		$cats = $categories->orderByName()->take(12)->get();
		return view('welcome', compact('cats'));
	}

	public function businessOpportunity()
	{
		return view('business-opportunity.index');
	}

	public function videos()
	{
		return view('videos.index');
	}


	public function manuals()
	{
		return view('manuals.index');
	}


	public function contact()
	{
		return view('contact.index');
	}


	public function sendmail(ProductContactFormRequest $request, Client $client)
	{


		if (!$client::where('email', $request->email)->exists()) {
			$client->fill($request->only('name', 'email', 'phone'));
			$client->save();
		}


		Mail::to($request->reciever)->queue(new ContactForm($subject = $request->subject, $name = $request->name, $email = $request->email, $phone = $request->phone, $message_body = $request->message_body));

		return back()->withSuccess('The Email was successfully send to us.');
	}
}
