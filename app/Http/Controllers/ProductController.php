<?php

namespace App\Http\Controllers;

use App\Category;
use App\Client;
use App\Http\Requests\Email\ProductContactFormRequest;
use App\Mail\ClientProductContactMail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

	/**
	 * Send email
	 * @return [type] [description]
	 */
	public function sendmail(ProductContactFormRequest $request, Product $product, Client $client)
	{

		if (!$client::where('email', $request->email)->exists()) {
			$client->fill($request->only('name', 'email', 'phone'));
			$client->save();
		}


		Mail::to('info@capetillers.co.za')
			->queue(
				new ClientProductContactMail($sender = $request->email, $name = $request->name, $phone = $request->phone, $product = $product, $message_body = $request->message_body));

		return back()->withSuccess('We will came back to you as soon as possible.');
	}


}
