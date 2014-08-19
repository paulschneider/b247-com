<?php

Class ChannelController extends BaseController {

	/**
	 * The data to use for this controller class
	 * @var mixed
	 */
	public $data = null;

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

		$viewData['subChannels'] = getChannelSubChannels($viewData['nav'], $channel);

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
		# if we don't already have some data to use then grab some from the API
		if(is_null($this->data)) {
			$this->data = Api::get("subchannel/$subChannel/articles", ['page' => $page]);
		}
		
		# push the apps nav into the data array which we'll pass to the view
		$this->data['nav'] = getApplicationNav();

		# we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
		$channelType = getChannelType($this->data['channel']);

		# the channel/sub-channel combination we used to get here
		$this->data['route'] = $channel .'/'. $subChannel;

		# pass the subChannel sefName to the view so we know which channel we're viewing
		$this->data['activeChannel'] = $subChannel;

		# grab any subChannels so we can create a sub-nav 
		$this->data['subChannels'] = getChannelSubChannels($this->data['nav'], $channel);

		# we don't know what type of data we've had returned by the API so just throw it all at the view and let it decide what to use
		return View::make("channels.subChannel{$channelType}", $this->data);
	}

	/**
	 * [showListingSubChannel description]
	 * @param  [type] $channel    [description]
	 * @param  [type] $subChannel [description]
	 * @param  [type] $time       [description]
	 * @param  string $range      [description]
	 * @return [type]             [description]
	 */
	public function showListingSubChannel($channel, $subChannel, $time, $range = "week")
	{
		# grab the data we'll need for the view from the API
		$this->data = Api::get("subchannel/$subChannel/articles", ['range' => $range, 'time' => $time]);

		# get the rest of the data
		$this->showSubChannel($channel, $subChannel);

		#show the view
		return View::make("channels.subChannelListing", $this->data);
	}

	/**
	 * [showListingSubChannel description]
	 * @param  [type] $channel    [description]
	 * @param  [type] $subChannel [description]
	 * @param  [type] $time       [description]
	 * @param  string $range      [description]
	 * @return [type]             [description]
	 */
	public function showDayListingSubChannel($channel, $subChannel, $time, $range = "day")
	{
		# grab the data we'll need for the view from the API
		$this->data = Api::get("subchannel/$subChannel/articles", ['range' => $range, 'time' => $time]);

		# get the rest of the data
		$this->showSubChannel($channel, $subChannel);

		#show the view
		return View::make("channels.subChannelListingDay", $this->data);
	}
}