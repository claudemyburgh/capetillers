<?php 

namespace App\Breadcrumbs;

use Illuminate\Http\Request;

class Segment
{

	protected $request, $segment;

	/**
	 * [__contruct description]
	 * @param  Request $request [description]
	 * @param  [type]  $segment [description]
	 * @return [type]           [description]
	 */
	public function __construct(Request $request, $segment)
	{
		$this->request = $request;
		$this->segment = $segment;
	}

	/**
	 * [model description]
	 * @return [type] [description]
	 */
	public function model()
	{
		return collect($this->request->route()->parameters())->where('slug', $this->segment)->first();
	}


	/**
	 * [name description]
	 * @return [type] [description]
	 */
	public function name()
	{
		return title_case($this->segment);
	}

	/**
	 * [url description]
	 * @return [type] [description]
	 */
	public function url()
	{
		return url(implode(array_slice($this->request->segments(), 0, $this->position() + 1), '/'));
	}

	/**
	 * [position description]
	 * @return [type] [description]
	 */
	public function position()
	{
		return array_search($this->segment, $this->request->segments());
	}


}
