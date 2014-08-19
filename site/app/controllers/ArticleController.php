<?php

Class ArticleController extends BaseController {

	public function show($channel, $subChannel, $category, $article)
	{
		$response = App::make("ApiClient")->get("articles", [ 'subchannel' => $subChannel, 'category' => $category, 'article' => $article, 'dataOnly' => true ]);

		if($response['success'])
		{
			$data = $response['success']['data'];

			# Push the apps nav into the data array which we'll pass to the view
			$data['nav'] = getApplicationNav();

			$data['category'] = $category;
			$data['apiKey'] = Config::get('googlemaps.ApiKey');

			if(isset($data['article']['mapItems'])) {
				$data['mapItems'] = json_encode($data['article']['mapItems']);
			}	

			$data['isMobile'] = false;

			# we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
			$data['channelType'] = strtolower(getChannelType($data['channel']));

			# whatever channel we're on set it as the active channel
			$data['activeChannel'] = $channel;

			# grab any subChannels so we can create a sub-nav 
			$data['subChannels'] = getChannelSubChannels($data['nav'], $channel);

			# we don't know what type of data we've had returned by the API so just throw it all at the view and let it decide what to use
			return View::make("articles.template", $data);
		}
	}	

	/**
	* Function called by the API to retrieve the template file, populate it with the supplied data and return it
	*
	*/
	public function getAppArticle()
	{
		$data = Input::get('data');

		# we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
		$channelType = strtolower(Input::get('type'));

		$data['isMobile'] = true;
		$data['apiKey'] = Config::get('googlemaps.ApiKey');
		$data['mapItems'] = json_encode($data['article']['mapItems']);

		# create a response array to return to the caller
		$response = [
			'success' => [
				'data' => [
					'html' => View::make("articles.partials.{$channelType}", $data)->render()
				]
			]
		];

		return Response::json($response);
	}
}