<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SettingsController extends Controller
{
    

	public function index()
	{
		return view('admin.settings.index');
	}

	public function db_clean()
	{

		Artisan::call('database:clean');

		return 'cleaned';
	}	


	public function make_sitmap()
	{

		Artisan::call('sitemap:generate');

		return 'success';
	}


}
