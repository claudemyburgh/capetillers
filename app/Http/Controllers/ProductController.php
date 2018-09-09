<?php

namespace App\Http\Controllers;

use PDF;
use App\Agent;
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

	/**
	 * [getImage description]
	 * @param  [type] $image [description]
	 * @return [type]        [description]
	 */
	public function getImage($image)
	{
		return $image = Image::make($image)->resize(320, 240);
	}

	/**
	 * [download description]
	 * @param  Category $category [description]
	 * @param  Product  $product  [description]
	 * @param  Agent    $agents   [description]
	 * @return [type]             [description]
	 */
	public function download(Category $category, Product $product, Agent $agents)
	{

		$pdf = PDF::loadView('product.pdf', compact('category','product', 'agents'));
		return $pdf->download("{$product->slug}-cape-tillers.pdf");
		// return $pdf->download('product.pdf');

	}



}
