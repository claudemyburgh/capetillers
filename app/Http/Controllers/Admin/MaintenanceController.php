<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class MaintenanceController extends Controller
{
    

	public function index()
	{
		return view('admin.maintenance.index');
	}

	public function db_clean()
	{

		Artisan::queue('database:clean');
		Log::info('Database cleaned');
		return 'cleaned';
	}	


	public function make_sitmap()
	{

		Artisan::queue('sitemap:generate');

		Log::info('Sitemap created');

		return 'success';
	}


	public function config()
	{

		Artisan::queue('config:cache');

		Log::info('Config cached');

		return 'config cached';
	}

	public function view()
	{

		Artisan::queue('view:cache');

		Log::info('View cached');

		return 'view cached';
	}


}
