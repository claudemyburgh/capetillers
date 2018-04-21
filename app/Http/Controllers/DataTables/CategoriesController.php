<?php

namespace App\Http\Controllers\DataTables;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataTables\DatatablesController;
use Illuminate\Http\Request;

class CategoriesController extends DatatablesController
{


	protected $modalText = "CREATE A NEW CATEGORY";

	public function builder()
	{
		return Category::query();
	}



	/**
	 * Create a record
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
	public function store(Request $request) 
	{
		$request->validate([
			'name' => 'required'
		]);

	    if (!$this->allowCreation) {
	        return;
	    }

	    // dd($request);

	    $this->builder->create([
	    	'name' => $request->name,
	    	'description' => $request->description
	    ]);
	}   

	/**
	 * Give table new name
	 * @return [type] [description]
	 */	
	public function getCustomTableName() 
	{
		return "Categories";
	}     


	    /**
     * List out updateable columns 
     * @return [type] [description]
     * Can be overridden in controller
     */
    protected function getUpdatableColumns()
    {
        return ['name', 'description'];
    }   


	/**
	 * List out updateable columns 
	 * @return [type] [description]
	 * Can be overridden in controller
	 */
	protected function getDisplayableColumns()
	{
	    return ['id', 'name', 'slug'];
	}    
		
	public function getFormFieldTypes()
	{
	    return ['name' => 'text', 'description' => 'textarea'];
	}   


}
