<?php namespace Kkstudio\Info\Controllers;

use Illuminate\Routing\Controller;
use Kkstudio\Info\Models\Info;

class InfoController extends Controller {
	
	public function admin()
	{		
		return \View::make('info::admin');
	}

	public function edit() {

		if(\Input::hasFile('avatar')) {

			$name = \Str::random(32) . \Str::random(32) . '.png';
			$image = \Image::make(\Input::file('avatar')->getRealPath());

            $image->resize(300, 300)->save(public_path('assets/info/' . $name));

			$object = Info::where('key', 'avatar')->first();

			if($object) {

				$object->value = $name;
				$object->save();

			} else {

				Info::create([

					'key' => 'avatar',
					'value' => $name

				]);

			}

		}

		$fields = [ 'header', 'about', 'address' ];

		foreach($fields as $field) {

			if(!\Request::get($field)) continue;

			if(module('Info')->$field()) {

				$object = Info::where('key', $field)->first();

				if($object) {

					$object->value = \Request::get($field);
					$object->save();

				}

			} else {

				Info::create([

					'key' => $field,
					'value' => \Request::get($field)

				]);

			}

		}

		\Flash::success('Changes has been saved.');

		return \Redirect::back();

	}

}