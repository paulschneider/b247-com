<?php

Class ChannelController extends BaseController {

	/**
	 * [showChannel description]
	 * @param  [type] $channel [description]
	 * @return [type]          [description]
	 */
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

	/**
	 * [showSubChannel description]
	 * @param  [type] $channel    [description]
	 * @param  [type] $subChannel [description]
	 * @return [type]             [description]
	 */
	public function showSubChannel($channel, $subChannel, $page = 1)
	{
		$data = Api::get("subchannel/$subChannel/articles", ['page' => $page]);

		# push the apps nav into the data array which we'll pass to the view
		$data['nav'] = getApplicationNav();

		# we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
		$channelType = getChannelType($data['channel']);

		# the channel/sub-channel combination we used to get here
		$data['route'] = $channel .'/'. $subChannel;

		# pass the subChannel sefName to the view so we know which channel we're viewing
		$data['activeChannel'] = $subChannel;

		# we don't know what type of data we've had returned by the API so just throw it all at the view and let it decide what to use
		return View::make("channels.subChannel{$channelType}", $data);
	}
}