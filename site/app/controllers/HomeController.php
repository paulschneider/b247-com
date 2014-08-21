<?php

class HomeController extends BaseController {

	public function showHomePage()
	{
		$response = App::make("ApiClient")->get("home");

		if($response['success'])
		{
			$data = $response['success']['data'];

			if (! Session::has('nav') ) {
			    Session::put('nav', $data['channels']);
			}

			$viewData = [
				'adverts' => $data['adverts'],
				'features' => $data['features'],
				'picks' => $data['picks'],
				'channelFeed' => $data['channelFeed'],
			];
			
			return View::make('home.index', $viewData);
		}
	}
}
