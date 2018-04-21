<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
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
