<?php

class HomeController extends BaseController {

	public function showHomePage()
	{
		$data = Api::get("/", [], [ 'X-accessKey' => 'pjs123456' ]);

		$viewData = [
			'nav' => $data['channels'],
			'adverts' => $data['adverts'],
			'features' => $data['features'],
			'picks' => $data['picks'],
			'channelFeed' => $data['channelFeed'],
		];

		//sd($viewData['features']);
		
		return View::make('home.index', $viewData);
	}

}
