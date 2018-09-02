<?php

namespace App;

use App\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   
	protected $fillable = ['name', 'slug', 'description', 'user_id'];


	/**
	* Get the route key for the model.
	*
	* @return string
	*/
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * [breadcrumbValue description]
     * @return [type] [description]
     */
    public function breadcrumbValue()
    {
    	return title_case($this->name);
    }


    public function user()
    {
    	return $this->belongsTo(User::class);
    }


    /**
     * Product relationship
     * @return [type] [description]
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }


    /**
     * Orderbyname scope
     * @param  [type] $builder   [description]
     * @param  string $direction [description]
     * @return [type]            [description]
     */
    public function scopeOrderByName($builder, $direction = 'asc')
    {
    	return $builder->orderBy('name', $direction);
    }



}
