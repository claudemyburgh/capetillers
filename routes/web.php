<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',  'PagesController@index')->name('frontpage');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('product/categories', 'CategoryController@index')->name('categories.index');
Route::get('product/{category}', 'ProductController@index')->name('product.index');
Route::get('products/{category}/{product}', 'ProductController@show')->name('product.show');
Route::get('business-opportunity', 'PagesController@businessOpportunity')->name('business-opportunity.index');

Route::post('email/product/{product}', 'ProductController@sendmail')->name('email.product.info');

Route::get('/videos', 'PagesController@videos')->name('videos.index');
Route::get('/manuals', 'PagesController@manuals')->name('manuals.index');
Route::get('/contact-us', 'PagesController@contact')->name('contact.index');
Route::post('/contact-us/send', 'PagesController@sendmail')->name('contact.send');



Route::group(['middleware' => ['auth', 'roles:admin'], 'prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin'], function(){

	/**
	 * Admin entry point
	 */
	Route::get('/', 'AdminController@index')->name('index');

	Route::group(['middleware' => ['roles:super admin']], function(){

		/**
		 * Categories 
		 */
		Route::get('categories', 'CategoriesController@index')->name('categories.index');

		/**
		 * Users
		 */
		Route::get('users', 'UsersController@index')->name('users.index');


		/**
		 * Products
		 */
		Route::get('products', 'ProductsController@index')->name('products.index');
		Route::get('products/list', 'ProductsController@list')->name('products.list');
		Route::get('product/create', 'ProductsController@create')->name('product.create.start');
		Route::get('product/create/{product}', 'ProductsController@create')->name('product.create');
		Route::post('product/{product}', 'ProductsController@store')->name('product.store');

		/**
		 * Photos
		 */

		Route::post('/product/{product}/upload', 'PhotosController@store')->name('product.photo.store');
		Route::delete('/product/{product}/upload/{photo}', 'PhotosController@destroy')->name('product.photo.destroy');

		/**
		 * Roles and Permissions
		 */
		Route::get('rolesandpermissions', 'RolesPermissionsController@index')->name('rolesandpermissions.index');

	});

	/**
	 * Clients
	 */
	Route::get('clients', 'ClientsController@index')->name('clients.index');



	/**
	 *  Agents
	 */
	
	Route::get('agents', 'AgentsController@index')->name('agents.index');

});


Route::group(['middleware' => ['auth'], 'as' => 'data.'], function(){

	Route::resource('data/categories', 'DataTables\CategoriesController');
	Route::resource('data/users', 'DataTables\UsersController');
	Route::resource('data/clients', 'DataTables\ClientsController');
	Route::resource('data/products', 'DataTables\ProductsController');
	Route::resource('data/roles', 'DataTables\RolesController');
	Route::resource('data/permissions', 'DataTables\PermissionsController');
	Route::resource('data/agents', 'DataTables\AgentsController');

});

Route::post('/sidebarsession', 'Api\SessionsController@store')->name('sidebartoggle');
