<?php namespace Kkstudio\Info\Repositories;

use Kkstudio\Blog\Models\Info as Model;

class InfoRepository {

	public function all() 
	{
		return Model::all();
	}

}