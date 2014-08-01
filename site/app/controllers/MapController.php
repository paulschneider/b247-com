<?php

Class MapController extends BaseController {

	public function index()
	{
		$data = Api::get('');
		$data1 = Api::get("/category/15/directory/articles", ['subChannel' => 71]);

		$viewData = [
			'nav' => $data['channels'],
			'apiKey' => Config::get('googlemaps.ApiKey'),
			'mapItems' => json_encode($data1['map'])
		];

		return View::make('articles.directoryArticle', $viewData);
	}

}