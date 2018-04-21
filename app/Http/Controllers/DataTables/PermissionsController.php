<?php

namespace App\Http\Controllers\DataTables;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataTables\DatatablesController;
use Designbycode\RolesAndPermissions\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends DatatablesController
{
	protected $modalText = 'ADD A NEW PERMISSION';

	protected $allowCreation = true;
	protected $allowDeletion = false;
	protected $searchable = false;
	// protected $modalText = null;

	public function builder()
	{
		return Permission::query();
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
	    		// 'email' => 'required|string|email|max:255|unique:clients',
	    		// 'phone' => []
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
			return "Permission";
		}     

		/**
		 * List out updateable columns 
		 * @return [type] [description]
		 * Can be overridden in controller
		 */
		protected function getUpdatableColumns()
		{
		    return ['name'];
		}   



		/**
		* List out updateable columns 
		* @return [type] [description]
		* Can be overridden in controller
		*/
		protected function getDisplayableColumns()
		{
			return ['id', 'name'];
		}    



}
