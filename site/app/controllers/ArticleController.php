<?php

Class ArticleController extends BaseController {

	public function show($channel, $subChannel, $category, $article)
	{
		$response = App::make("ApiClient")->get("articles", [ 'subchannel' => $subChannel, 'category' => $category, 'article' => $article, 'dataOnly' => true, 'time' => Input::get('time') ]);

		if(isset($response['success']))
		{
			$data = $response['success']['data'];

			$data['category'] = $category;
			$data['apiKey'] = Config::get('googlemaps.ApiKey');

			if(isset($data['article']['mapItems'])) {
				$data['mapItems'] = $data['article']['mapItems'];
			}	

			$data['isMobile'] = false;

			# we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
			$data['channelType'] = strtolower(getChannelType($data['channel']));

			# show the category list when we're viewing an article
			$data['showCategory'] = true;

			# which top level channel should be showing
			$data['activeChannel'] = $channel;

			# grab any subChannels so we can create a sub-nav 
			$data['subChannels'] = getChannelSubChannels(getApplicationNav(), $channel);

			# there was an issue doing....... something
			if(Session::has('error')) {
				# set some error vars
				$data['message'] = Session::get('error')['public'];
				$data['messageClass'] = "danger";
			}

			# something just happened that caused a success value to be stored
			if(Session::has('success')) {
				# set some success vars
				$data['message'] = Session::get('success')['public'];
				$data['messageClass'] = "success";
			}		

			# define a route for the current articles comment page. This is output only when the
			# article is viewed on a mobile device
			$data['commentRoute'] = baseUrl().$data['article']['shareLink'].'comments';	

			# send a title to be used as the browser title
			$data['pageTitle'] = getPageTitle($data);

			# we don't know what type of data we've had returned by the API so just throw it all at the view and let it decide what to use
			return View::make("articles.template", $data);
		}
		# otherwise respond to the error (BaseController::respond())
		else {
			return parent::respond($response);
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
		$data['mapItems'] = $data['article']['mapItems'];

		# define a route for the current articles comment page. This is output only when the
		# article is viewed on a mobile device
		$data['commentRoute'] = baseUrl().'/'.$data['article']['shareLink'].'comments';

		# create a response array to return to the caller
		$response = [
			'success' => [
				'data' => [
					'html' => View::make("articles.partials.{$channelType}.index", $data)->render()
				]
			]
		];

		return Response::json($response);
	}

	public function getArticleComments($channel, $subChannel, $category, $article)
	{
		$response = App::make("ApiClient")->get("articles", [ 'subchannel' => $subChannel, 'category' => $category, 'article' => $article, 'dataOnly' => true ]);

		if(isset($response['success']))
		{
			$data = $response['success']['data'];
		}

		return View::make('comments.thread', $data);
	}
}