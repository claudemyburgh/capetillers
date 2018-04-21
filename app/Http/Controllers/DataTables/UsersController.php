<?php

namespace App\Http\Controllers\DataTables;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataTables\DatatablesController;
use App\User;
use Illuminate\Http\Request;

class UsersController extends DatatablesController
{

	protected $modalText = 'CREATE A NEW USER';
    
	public function builder()
	{
		return User::query();
	}

    /**
     * Create a record
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request) 
    {

    	$request->validate([
    		'name' => 'required|string|max:255',
    		'email' => 'required|string|email|max:255|unique:users',
    		'password' => 'required|string|min:6',
    	]);

        if (!$this->allowCreation) {
            return;
        }

        $this->builder->create([
        	'name' => $request->name,
        	'email' => $request->email,
        	'password' => bcrypt($request->password),
        	'active' => $request->active
        ]);
    }   



	/**
	 * Give table new name
	 * @return [type] [description]
	 */	
	public function getCustomTableName() 
	{
		return "Users";
	}     


	/**
	* List out updateable columns 
	* @return [type] [description]
	* Can be overridden in controller
	*/
	protected function getUpdatableColumns()
	{
		return ['name', 'email', 'password', 'active'];
	}   


	/**
	* List out updateable columns 
	* @return [type] [description]
	* Can be overridden in controller
	*/
	protected function getDisplayableColumns()
	{
		return ['id', 'name', 'email', 'active'];
	}    


	public function getFormFieldTypes()
	{
	    return ['name' => 'text', 'email' => 'email', 'password' => 'password', 'active' => 'text'];
	}   



}
