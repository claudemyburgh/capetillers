<?php

namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class SessionsController extends Controller
{

	public function store(Request $request)
	{


	    if (Session::has('sidebar')){
	        Session::forget('sidebar');
	    }else{
	        Session::put('sidebar', 'menu-small');
	    }


	    // return response()->json();

	}



}
