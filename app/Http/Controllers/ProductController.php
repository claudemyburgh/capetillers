<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use Newsletter;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientProductContactMail;
use App\Http\Requests\Email\ProductContactFormRequest;

class ProductController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Category $category)
	{

		
		$products = $category->products()->isLive()->get();
		

		return view('product.index', compact(['products', 'category']));
	}



	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Product  $product
	 * @return \Illuminate\Http\Response
	 */
	public function show(Category $category, Product $product)
	{
	
		return view('product.show', compact('category','product'));
	}


	public function getImage($image)
	{

		return $img = Image::make($image)->resize(320, 240);

	}

	/**
	 * Send email
	 * @return [type] [description]
	 */
	public function sendmail(ProductContactFormRequest $request, Product $product, Client $client)
	{

		if (!$client::where('email', $request->email)->exists()) {
			$client->sync($request->only('name', 'email', 'phone'));
			$client->save();
		}


		Mail::to('info@capetillers.co.za')
			->queue(
				new ClientProductContactMail($sender = $request->email, $name = $request->name, $phone = $request->phone, $product = $product, $message_body = $request->message_body));

		if ( ! Newsletter::isSubscribed($request->email) ) {
		    Newsletter::subscribe($request->email);
		    Log::info($request->email . ' added to list');
		}



		return back()->withSuccess('We will came back to you as soon as possible.');
	}


}
