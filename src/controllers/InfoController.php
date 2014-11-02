<?php namespace Kkstudio\Info\Controllers;

use Illuminate\Routing\Controller;
use Kkstudio\Info\Models\Info;

class InfoController extends Controller {
	
	public function admin()
	{		
		return \View::make('info::admin');
	}

	public function edit(\App\Http\Requests\ImageRequest $request) {

		if(\Input::hasFile('avatar')) {

			$name = \Str::random(32) . \Str::random(32) . '.png';
			$image = \Image::make(\Input::file('avatar')->getRealPath());

            $image->save(public_path('assets/info/' . $name));

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

		if(\Input::hasFile('cover')) {

			$name = \Str::random(32) . \Str::random(32) . '.png';
			$image = \Image::make(\Input::file('cover')->getRealPath());

            $image->save(public_path('assets/info/' . $name));

			$object = Info::where('key', 'cover')->first();

			if($object) {

				$object->value = $name;
				$object->save();

			} else {

				Info::create([

					'key' => 'cover',
					'value' => $name

				]);

			}

		}

		$fields = [ 'name', 'title', 'header', 'about', 'address', 'footer' ];

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

		\Flash::success('Zmiany zostały zapisane.');

		return \Redirect::back();

	}

}