<?php

Class ArticleController extends BaseController {

	public function show($channel, $subChannel, $category, $article)
	{
		$data = Api::get("articles", [ 'subchannel' => $subChannel, 'category' => $category, 'article' => $article, 'dataOnly' => true ]);

		// Push the apps nav into the data array which we'll pass to the view
		$data['nav'] = getApplicationNav();

		$data['category'] = $category;

		// we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
		$data['channelType'] = getChannelType($data['channel']);

		// we don't know what type of data we've had returned by the API so just throw it all at the view and let it decide what to use
		return View::make("articles.template", $data);
	}	

	/**
	* Function called by the API to retrieve the template file, populate it with the supplied data and return it
	*
	*/
	public function getAppArticle()
	{
		$data = Input::get('data');

		// we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
		$channelType = Input::get('type');

		// create a response array to return to the caller
		$response = [
			'success' => [
				'data' => [
					'html' => View::make("partials.tplDefaultArticle", $data)->render()
				]
			]
		];

		return Response::json($response);
	}
}