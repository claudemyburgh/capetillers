<?php

namespace App;

use App\Category;
use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['sku', 'name', 'slug', 'excerpt', 'content', 'category_id', 'availability', 'live', 'onsale', 'price', 'salesprice'];



    /**
     * Get by slug name
     * @return [type] [description]
     */
    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }



    /**
     * Photo relastioship
     */
    public function photos()
    {
        return $this->hasMany(Photo::class);
    }


    /**
     * Scopes
     */


    public function scopeIsLive($builder)
    {
        return $builder->where('live', true);
    }
    

    public function scopeRondomProducts($query)
    {
    	return $query->orderByRaw('RAND()');
    }

}
