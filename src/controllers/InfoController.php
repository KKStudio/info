<?php namespace Kkstudio\Info\Controllers;

use Illuminate\Routing\Controller;

class InfoController extends Controller {
	
	public function admin()
	{		
		return \View::make('info::admin');
	}

}