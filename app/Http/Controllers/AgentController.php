<?php

namespace App\Http\Controllers;

use App\Agent;
use Illuminate\Http\Request;
use App\Http\Resources\AgentsResource;

class AgentController extends Controller
{
   
	public function list(Agent $agents)
	{
		$agents = $agents->get();

		return AgentsResource::collection($agents);
	}




}
