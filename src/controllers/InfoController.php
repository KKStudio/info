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
			$image = \Image::make(\Input::file('image')->getRealPath());

            $image->resize(300, null, function ($constraint) {

                $constraint->aspectRatio();

            })->save(public_path('assets/info/' . $name));

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

		return \Flash::success('Changes has been saved.');

	}

}