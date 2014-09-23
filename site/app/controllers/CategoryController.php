<?php

Class CategoryController extends BaseController {

	public function show($channel, $subChannel, $category, $page = 1)
	{
		$response = App::make("ApiClient")->get("category/$category/articles", ['subChannel' => $subChannel, 'page' => $page, 'time' => Input::get('time')]);

		if(isset($response['success']))
		{
			$data = $response['success']['data'];

			# the category being viewed now
			$data['category'] = $category;

			# grab any subChannels so we can create a sub-nav 
			$data['subChannels'] = getChannelSubChannels(getApplicationNav(), $channel);

			# the channel/sub-channel/category combination we used to get here
			$data['route'] = 'channel/'.$channel .'/'. $subChannel .'/'. $category;

			# we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
			$channelType = getChannelType($data['channel']);

			# which top level channel should be showing
			$data['activeChannel'] = $channel;

			# tell the view what we're looking at
			$data['showCategory'] = true;

			# if there is a map object then we will be showing a map
			if( isset($data['map']) ) {
				$data['mapItems'] = json_encode($data['map']);	
				$data['apiKey'] = Config::get('googlemaps.ApiKey');
			}		

			# we don't know what type of data we've had returned by the API so just throw it all at the view and let it decide what to use
			return View::make("categories.{$channelType}", $data);
		}
		# otherwise respond to the error (BaseController::respond())
		else {
			return parent::respond($response);
		}
	}	
}