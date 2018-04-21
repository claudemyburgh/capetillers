<?php 

namespace App\Http\ViewComposers;


use App\Agent;
use Illuminate\Contracts\View\View;


class ContactComposer
{

	private $agents;

	public function compose(View $view)
	{
		if (!$this->agents){
			$this->agents = Agent::get();
		}

		$view->with('agents', $this->agents);
	}



}