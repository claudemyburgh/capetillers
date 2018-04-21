<?php

namespace App\Http\Controllers\DataTables;

use App\Http\Controllers\Controller;
use App\Http\Controllers\DataTables\DatatablesController;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends DatatablesController
{
    

    protected $modalText = 'ADD A NEW CLIENT';

    protected $allowCreation = false;
    protected $allowDeletion = true;
    // protected $searchable = true;
    // protected $modalText = null;

    public function builder()
    {
    	return Product::query();
    }

        /**
         * Create a record
         * @param  Request $request [description]
         * @return [type]           [description]
         */
        public function store(Request $request) 
        {

        	$request->validate([
                'sku' => 'required|string|unique:products,sku,' .$this->builder->id,
                'name' => 'required|string|unique:products,name,' . $this->builder->id,
                'excerpt' => 'nullable|string|max:250',
                'content' => 'nullable',
                'price' => ['nullable', 'regex:/^\d{1,13}(\.\d{1,4})?$/'],
                'salesprice' => ['nullable', 'regex:/^\d{1,13}(\.\d{1,4})?$/'],
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
    		return "Products";
    	}     


    	/**
    	* List out updateable columns 
    	* @return [type] [description]
    	* Can be overridden in controller
    	*/
    	protected function getUpdatableColumns()
    	{
    		return [ 'sku', 'name', 'slug', 'price', 'salesprice'];
    	}   


    	/**
    	* List out updateable columns 
    	* @return [type] [description]
    	* Can be overridden in controller
    	*/
    	protected function getDisplayableColumns()
    	{
    		return ['id', 'sku', 'name', 'slug', 'price', 'salesprice'];
    	}    




}
