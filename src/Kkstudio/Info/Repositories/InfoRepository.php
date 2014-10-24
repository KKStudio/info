<?php namespace Kkstudio\Info\Repositories;

use Kkstudio\Info\Models\Info as Model;

class InfoRepository {

	public function all() 
	{
		return Model::all();
	}

}