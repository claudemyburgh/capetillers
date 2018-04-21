<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$categories = [

    	    [
    	        'name' => 'engins',
    	        'description' => ''
    	    ],
    	    [
    	        'name' => 'tillers',
    	        'description' => ''
    	    ],
    	    [
    	        'name' => 'tiller attachments',
    	        'description' => ''
    	    ],
    	    [
    	        'name' => 'tow behinds',
    	        'description' => ''
    	    ],
    	    [
    	        'name' => 'two wheel tractors',
    	        'description' => ''
    	    ],
    		[
    			'name' => 'two wheel tractors attachments',
    			'description' => ''
    		],
    	    [
    	        'name' => 'trailers',
    	        'description' => ''
    	    ],
    	    [
    	        'name' => 'trenchers',
    	        'description' => ''
    	    ],
    	    [
    	        'name' => 'grass cutters',
    	        'description' => ''
    	    ],
    	    [
    	        'name' => 'stork cutters',
    	        'description' => ''
    	    ],
    	    [
    	        'name' => 'vegetable seeders',
    	        'description' => ''
    	    ],
    	    [
    	        'name' => 'wood chippers',
    	        'description' => ''
    	    ],

    	];



    	foreach($categories as $category)
    	{
    		Category::create($category);
    	}
    }
}
