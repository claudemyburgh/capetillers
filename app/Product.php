<?php

namespace App;

use App\Photo;
use App\Category;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	use Searchable;

	
	protected $fillable = ['sku', 'name', 'slug', 'excerpt', 'content', 'category_id', 'availability', 'live', 'onsale', 'price', 'salesprice'];



	/**
	 * Get by slug name
	 * @return [type] [description]
	 */
	public function getRouteKeyName()
	{
		return 'slug';
	}

	/**
	 * [category description]
	 * @return [type] [description]
	 */
	public function category()
	{
		return $this->belongsTo(Category::class);
	}


	/**
	 * Get the indexable data array for the model.
	 *
	 * @return array
	 */
	public function toSearchableArray()
	{
		$products =  $this-->toArray();

		$products['category'] = $this->category;


		return $products;
	}

	/**
	 * [breadcrumbValue description]
	 * @return [type] [description]
	 */
	public function breadcrumbValue()
	{
		return title_case($this->name);
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
