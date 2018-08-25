<?php

namespace App;

use App\Traits\ActivableTrait;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{

	use ActivableTrait;

   	protected $fillable = [
   		'name',
   		'company',
   		'area',
   		'phone',
   		'cell',
   		'email',
   		'website',
   		'active'
   	];





}
