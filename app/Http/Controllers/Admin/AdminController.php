<?php

namespace App\Http\Controllers\Admin;


use App\Agent;
use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    

	public function index()
	{

		$agents = Agent::count();
		$products = Product::isLive()->count();
		$clients = Client::count();
		

	

		return view('admin.index', compact(['agents', 'products', 'clients']));
	}



}
