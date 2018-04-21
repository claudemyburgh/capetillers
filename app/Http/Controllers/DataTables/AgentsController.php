<?php

namespace App\Http\Controllers\DataTables;

use App\Agent;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataTables\DatatablesController;
use Illuminate\Http\Request;
use LVR\Phone\Phone;

class AgentsController extends DatatablesController
{
    

        protected $modalText = "CREATE A NEW AGENT";

        public function builder()
        {
            return Agent::query();
        }



        /**
         * Create a record
         * @param  Request $request [description]
         * @return [type]           [description]
         */
        public function store(Request $request) 
        {
            $request->validate([
                'name' => 'required',
                'company' => 'nullable|string',
                'area' => 'required|string|max:100',
                'phone' => ['nullable', new Phone ],
                'cell' => ['required', new Phone ],
                'email' => 'required|email',
                'website' => 'nullable',
                'active' => 'required'
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
            return "Agent";
        }     


            /**
         * List out updateable columns 
         * @return [type] [description]
         * Can be overridden in controller
         */
        protected function getUpdatableColumns()
        {
            return [ 'name', 'company', 'area', 'phone', 'cell', 'email', 'website', 'active'];
        }   


        /**
         * List out updateable columns 
         * @return [type] [description]
         * Can be overridden in controller
         */
        protected function getDisplayableColumns()
        {
            return ['id', 'name', 'company', 'area', 'phone', 'cell', 'email', 'website', 'active'];
        }    

        public function getFormFieldTypes()
        {
            return [
                'name' => 'text',
                'company' => 'text',
                'area' => 'text',
                'phone' => 'tel',
                'cell' => 'tel',
                'email' => 'email',
                'website' => 'url',
                'active' => 'text'];
        }   





}
