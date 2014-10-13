<?php

Class ChannelController extends BaseController {

	/**
	 * The data to use for this controller class
	 * @var mixed
	 */
	public $data = null;

	/**
	 * obtain and display a top level channel
	 * @param  string $channel [unique identifier for the channel]
	 * @return View
	 */
	public function showChannel($channel)
	{ 
		if(getAccessKey()) {
			$headers = ['accessKey' => $accessKey];
		}
		else {
			$headers = [];
		}

		$response = App::make("ApiClient")->get("channel/$channel", [], $headers);

		if(isset($response['success']))
		{
			$data = $response['success']['data'];

			$viewData = [
				'channel' => $data['channel'],
				'adverts' => $data['adverts'],
				'features' => $data['features'],
				'picks' => $data['picks'],
				'channelFeed' => $data['channelFeed'],
			];

			# pass the subChannel sefName to the view so we know which channel we're viewing
			$viewData['activeChannel'] = $channel;

			# grab the sub-channels so we can make a sub-nav out of them
			$viewData['subChannels'] = getChannelSubChannels(getApplicationNav(), $channel);

			# send a title to be used as the browser title
			$viewData['pageTitle'] = $data['channel']['name'];

			# set the pages meta description value
			$viewData['metaDescription'] = trim($data['channel']['description']);

			return View::make('home.index', $viewData);
		}
		else {
			return parent::respond($response);
		}		
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
		if(is_null($this->data)) 
		{
			if(getAccessKey()) {
				$headers = ['accessKey' => $accessKey];
			}
			else {
				$headers = [];
			}

			$response = App::make("ApiClient")->get("subchannel/$subChannel/articles", ['page' => $page], $headers);

			if(isset($response['success']))
			{
				$this->data = $response['success']['data'];
			}
			else {
				return parent::respond($response);
			}
		}

		# we need to work out what type of page to display based on the channel type (e.g listing, promotion, directory or article)
		$channelType = getChannelType($this->data['channel']);

		# the channel/sub-channel combination we used to get here
		$this->data['route'] = '/channel/'.$channel .'/'. $subChannel;

		# pass the subChannel sefName to the view so we know which channel we're viewing
		$this->data['showSubChannel'] = true;

		# which top level channel should be showing
		$this->data['activeChannel'] = $channel;

		# grab any subChannels so we can create a sub-nav 
		$this->data['subChannels'] = getChannelSubChannels(getApplicationNav(), $channel);

		# send a title to be used as the browser title
		$this->data['pageTitle'] = getPageTitle($this->data);

		# set the pages meta description value
		$this->data['metaDescription'] = trim($this->data['channel']['description']);	

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
		$response = App::make("ApiClient")->get("subchannel/$subChannel/articles", ['range' => $range, 'time' => $time]);

		if(isset($response['success']))
		{
			$this->data = $response['success']['data'];

			# get the rest of the data
			$this->showSubChannel($channel, $subChannel);

			#show the view
			return View::make("channels.subChannelListing", $this->data);
		}	
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
		$response = App::make("ApiClient")->get("subchannel/$subChannel/articles", ['range' => $range, 'time' => $time]);

		if(isset($response['success']))
		{
			$this->data = $response['success']['data'];

			# get the rest of the data
			$this->showSubChannel($channel, $subChannel);

			#show the view
			return View::make("channels.subChannelListingDay", $this->data);
		}
		# otherwise respond to the error (BaseController::respond())
		else {
			return parent::respond($response);
		}
	}
}