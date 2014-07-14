<?php

Class ChannelController extends BaseController {

	public function showChannel($channel)
	{
		$data = Api::get("channel/$channel");

		$viewData = [
			'nav' => getApplicationNav(),
			'adverts' => $data['adverts'],
			'features' => $data['features'],
			'picks' => $data['picks'],
			'channelFeed' => $data['channelFeed'],
		];

		return View::make('home.index', $viewData);
	}	

	public function showSubChannel($channel, $subChannel)
	{
		$data = Api::get("channel/$subChannel/articles");

		// Push the apps nav into the data array which we'll pass to the view
		$data['nav'] = getApplicationNav();

		// we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
		$channelType = getChannelType($data['channel']);

		// we don't know what type of data we've had returned by the API so just throw it all at the view and let it decide what to use
		return View::make("channels.subChannel{$channelType}", $data);
	}
}