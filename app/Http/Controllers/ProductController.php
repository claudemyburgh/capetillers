<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\Image;

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

		// dd(request()->breadcrumbs()->segments());
	
		return view('product.show', compact('category','product'));
	}


	public function getImage($image)
	{

		return $img = Image::make($image)->resize(320, 240);

	}



}
