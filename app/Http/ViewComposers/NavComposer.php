<?php 

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\Contracts\View\View;


class NavComposer
{

	private $categories;

	public function compose(View $view)
	{
		if (!$this->categories){
			$this->categories = Category::orderByName()->get();
		}

		$view->with('categories', $this->categories);
	}



}
