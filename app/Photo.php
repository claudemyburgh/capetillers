<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
		
		/**
		 * Protected fields
		 * @var array
		 */
		protected $guarded = ['id'];
		

		/**
		 * Use id for route model binding
		 * @return [type] [description]
		 */
		public function getRouteKeyName() 
		{
		    return 'id';
		}  


		/**
		 * Product relationship
		 */
		
		public function product()
		{
			return $this->belongsTo(Product::class);
		}
 



}
