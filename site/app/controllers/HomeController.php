<?php

class HomeController extends BaseController {

	public function showHomePage()
	{
		$data = Api::get("/home");

		if (! Session::has('nav') )
		{
		    Session::put('nav', $data['channels']);
		}

		$viewData = [
			'nav' => $data['channels'],
			'adverts' => $data['adverts'],
			'features' => $data['features'],
			'picks' => $data['picks'],
			'channelFeed' => $data['channelFeed'],
		];
		
		return View::make('home.index', $viewData);
	}

}
