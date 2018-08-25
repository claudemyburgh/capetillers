<?php 
namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait ActivableTrait
{

	public function scopeActive(Builder $builder)
	{
		return $builder->where('active', true);
	}

	public function isLive()
	{
		return $this->active === true;
	}


	public function isNotLive()
	{
		return !$this->isLive();
	}



}
