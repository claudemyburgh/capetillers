<?php

namespace App\Http\Controllers\DataTables;

use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Schema;

abstract class DatatablesController extends Controller
{

    protected $allowCreation = true;
    protected $allowDeletion = true;
    protected $searchable = true;
    protected $modalText = null;

    /**
     * The builder entity
     * @var Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * [builder description]
     * @return [type] [description]
     */
    abstract public function builder();

    /**
     * return builder
     */
    public function __construct()
    {
        $builder = $this->builder();

        if (!$builder instanceof Builder){
            throw new Exception('Entity builder not instance of Builder');
        }

        $this->builder = $builder;

    }         
    
    /**
     * index method
     * @return json [description]
     */
    public function index(Request $request) 
    {
        return response()->json([
            'data' => [
                'table' => $this->getCustomTableName(),
                'displayable' => array_values($this->getDisplayableColumns()),
                'updatable' => array_values($this->getUpdatableColumns()),
                'records' => $this->records($request),
                'custom_columns' => $this->getCustomColumnNames(),
                'modal_text' => $this->modalText,
                'form_field_type' => $this->getFormFieldTypes(),
                'allow' => [
                    'creation' => $this->allowCreation,
                    'deletion' => $this->allowDeletion,  
                    'searchable' => $this->searchable
                ]
            ]
        ]);
    }

    /**
     * Update model 
     * @param  [type]  $id      [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function update($id,Request $request) 
    {
        $this->builder->find($id)->update($request->only($this->getUpdatableColumns()));
    }        

    /**
     * Create a record
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function store(Request $request) 
    {
        if (!$this->allowCreation) {
            return;
        }

        $this->builder->create($request->only($this->getUpdatableColumns()));
    }   


    public function destroy($ids, Request $request) 
    {
        if (!$this->allowDeletion) {
            return;
        }
        $this->builder->whereIn('id', explode(',', $ids))->delete();
    }        
 
    /**
     * Give table new name
     * @return [type] [description]
     */
	public function getCustomTableName() 
    {
        return $this->builder->getModel()->getTable();	
    }        


    /**
     * Asign custom column names
     * @return arry
     */
    public function getCustomColumnNames() 
    {
        return [];
    }  


    public function getFormFieldTypes()
    {
        return ['text'];
    }      

    
    

    /**
     * Dislay all column of model except the hidden columns
     * @return [type] [description]
     */
    protected function getDisplayableColumns()
    {
        return array_values(array_diff($this->getDatabaseColumnNames(), $this->builder->getModel()->getHidden()));
    }   

    /**
     * List out updateable columns 
     * @return [type] [description]
     * Can be overridden in controller
     */
    protected function getUpdatableColumns()
    {
        return $this->getDisplayableColumns();
    }   

    /**
     * Get column names form model
     * @return [type] [description]
     */
     protected function getDatabaseColumnNames()
     {
        return Schema::getColumnListing($this->builder->getModel()->getTable());
     }    

    /**
     * Get all records on Model
     * @return [type] [description]
     */
    protected function records(Request $request) 
    {
        $builder = $this->builder;

        if ($this->hasSearchQuery($request)) {
            $builder = $this->buildSearch($builder, $request);
        }

        try {
            return $this->builder->limit($request->limit)->orderBy('id')->get($this->getDisplayableColumns());
            
        } catch (QueryException $e) {
            return [];
        }
    }        

    /**
     * [hasSearchQuery description]
     * @param  Request $request [description]
     * @return boolean          [description]
     */
    protected function hasSearchQuery(Request $request) 
    {
        $count = count(array_filter($request->only(['column', 'operator', 'value'])));
        return  $count === 3;
    }

    /**
     * [builderSearch description]
     * @param  Builder $builder [description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    protected function buildSearch(Builder $builder, Request $request)
    {
        $queryParts = $this->resolveQueryParts($request->operator, $request->value);
        return $builder->where($request->column, $queryParts['operator'], $queryParts['value']);
    }



    protected function resolveQueryParts($operator, $value)
    {
        return array_get([
            'equels' => [
                'operator' => '=',
                'value' => $value
            ], 
            'contains' => [
                'operator' => 'LIKE',
                'value' => "%{$value}%"
            ], 
            'starts_with' => [
                'operator' => 'LIKE',
                'value' => "{$value}%"
            ], 
            'ends_with' => [
                'operator' => 'LIKE',
                'value' => "%{$value}"
            ], 
            'greater_than' => [
                'operator' => '>',
                'value' => $value
            ], 
            'less_than' => [
                'operator' => '<',
                'value' => $value
            ], 

        ], $operator);
    }
    
    


}
