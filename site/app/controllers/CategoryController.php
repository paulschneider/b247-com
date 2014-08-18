<?php

Class CategoryController extends BaseController {

	public function show($channel, $subChannel, $category)
	{
		$data = Api::get("category/$category/articles", ['subChannel' => $subChannel]);

		// Push the apps nav into the data array which we'll pass to the view
		$data['nav'] = getApplicationNav();

		$data['category'] = $category;

		// we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
		$channelType = getChannelType($data['channel']);

		if( isset($data['map']) ) {
			$data['mapItems'] = json_encode($data['map']);	
		}
		
		$data['apiKey'] = Config::get('googlemaps.ApiKey');

		// we don't know what type of data we've had returned by the API so just throw it all at the view and let it decide what to use
		return View::make("categories.{$channelType}", $data);
	}	
}