<?php

namespace App\Http\Controllers\DataTables;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataTables\DatatablesController;
use App\Client;

class ClientsController extends DatatablesController
{
    protected $modalText = 'ADD A NEW CLIENT';

    public function builder()
    {
    	return Client::query();
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
        		'email' => 'required|string|email|max:255|unique:clients',
        		'phone' => []
        	]);

            if (!$this->allowCreation) {
                return;
            }

            $this->builder->create($request->only($this->getUpdatableColumns()));
        }   



    	/**
    	 * Give table new name
    	 * @return [type] [description]
    	 */	
    	public function getCustomTableName() 
    	{
    		return "Clients";
    	}     


    	/**
    	* List out updateable columns 
    	* @return [type] [description]
    	* Can be overridden in controller
    	*/
    	protected function getUpdatableColumns()
    	{
    		return ['name', 'email', 'phone'];
    	}   


    	/**
    	* List out updateable columns 
    	* @return [type] [description]
    	* Can be overridden in controller
    	*/
    	protected function getDisplayableColumns()
    	{
    		return ['id', 'name', 'email', 'phone'];
    	}    





}
