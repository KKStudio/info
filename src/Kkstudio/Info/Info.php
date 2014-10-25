<?php namespace Kkstudio\Info;

class Info extends \App\Module {

	private $info;
	private $data = [];

	public function __construct() 
	{
		$this->info = new Repositories\InfoRepository;
		$this->data = $this->intoArray($this->info->all());
	}

	public function __call($func, $args) {

		if(isset($this->data[$func])) {

			if(isset($args[0])) {

				if(isset($this->data[$func]->$args[0])) {

					return $this->data[$func]->$args[0];

				} else {

					return '';

				}

			}

			return $this->data[$func]->value;

		}

		return '';

	}

	private function intoArray($data) {

		$table = [];

		foreach($data as $item) {

			$table[$item->key] = $item;

		}

		return $table;

	}

	public function getAvatar() {

		if($this->avatar()) return asset('assets/info/' . module('Info')->avatar());
		
		return 'http://placehold.it/150x150';

	}

}