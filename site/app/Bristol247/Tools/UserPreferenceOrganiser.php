<?php namespace Bristol247\Tools;

class UserPreferenceOrganiser {

	/**
	 * the preferences array for the authenticated user
	 * 
	 * @var array
	 */
	private $preferences;

	/**
	 * the form array from the submission of the preferences page
	 * 
	 * @var array
	 */
	private $form;

	/**
	 * call all of the processes to update the main preferences array
	 *
	 * @param  array $preferences [a huge array containing all of the preferences for the auth'd user]
	 * @param  array $form [POST submission array]
	 */
	public function set($preferences, $form)
	{
		# make the preferences available to the class
		$this->preferences = $preferences;

		# make the form input available to the class
		$this->form = $form;

		# set the preferences for channels, sub-channels and categories
		$this->setChannels();

		# set the district preferences
		$this->setDistricts();

		# set the broadcast preferences
		$this->setBroadcasts();

		# ... and send it back to be sent off to the server and stored.
		return $this->preferences;
	}

	/**
	 * update user preferences with those provided in the form submission
	 * this method cascades the updates to sub-channels
	 * 
	 */
	public function setChannels()
	{
		$channels = $this->preferences['channels'];
 
		# if the user turned on all channels, we need to create the channel array
		# as it won't be submitted with all channel checkboxes unchecked
		if( ! isset($this->form['channel'])) {
			$this->form['channel'] = [];
		}

		# go through each of the channels (if any). If its in the form array then the user is turning the
		# channel off so set isEnabled = false
		foreach($channels AS $key => $channel)
		{
			# set the isEnabled based on whether the channels was turned on or off
			$channel['isEnabled'] = ! in_array($channel['id'], $this->form['channel']);

			# do the same for the sub-channels of this channel
			$channel['subChannels'] = $this->setSubChannels($channel);

			# over-write the channel with the updated data
			$channels[$key] = $channel;
		}

		# over-write the preferences entry with the updated channels data
		$this->preferences['channels'] = $channels;
	}

	/**
	 * set the sub-channel preferences based on the data provided through the user
	 * form submission. This process cascades to the updating of sub-channel category information
	 * 
	 * @param array $channel
	 */
	public function setSubChannels($channel)
	{
		# if the user turned on all sub-channels, we need to create the sub-channel array
		# as it won't be submitted with all sub-channel checkboxes unchecked
		if( ! isset($this->form['subChannel'])) {
			$this->form['subChannel'] = [];
		}

		# go through each of the sub-channels for this channel as set isEnabled based on
		# whether it was submitted as being deactivated
		foreach($channel['subChannels'] AS $key => $subChannel)
		{
			# work out whether to set the user preference isEnabled to true or false
			$subChannel['isEnabled'] = ! in_array($subChannel['id'], $this->form['subChannel']);

			# also update this sub-channels category preferences
			$subChannel['categories'] = $this->setCategories($channel, $subChannel);			

			# over-write the original sub-channel data with this new, updated stuff
			$channel['subChannels'][$key] = $subChannel;
		}

		# and send the channel back
		return $channel['subChannels'];
	}	

	/**
	 * work out whether the user has turned individual categories on or off
	 */
	public function setCategories($channel, $subChannel)
	{
		# if the user turned on categories, we need to create the category array
		# as it won't be submitted with all sub-channel categories unchecked
		if( ! isset($this->form['categories'])) {
			$categories = [];
		}

		$id = $channel['id'];

		# we had to set the form up with pre-fixed subChannel identifiers for the categories 
		# so we know which subChannel the category belongs to. Hence the sub-channel-<id> thing.
		if(isset($this->form['categories']['channel-'.$id]))
		{
			# we only want to turn a sub-set of this subChannel's categories off
			$categories = $this->form['categories']['channel-'.$id];
		}
		# otherwise there are no categories to turn off within this channel
		else {
			return $subChannel;
		}

		# go through the subChannel categories and set isEnabled
		foreach($subChannel['categories'] AS $key => $category)
		{			
			$category['isEnabled'] = true;
			
			# this is terrible. The apps were developed differently so we have to fall in line
			# with the way they do it. Correct this as soon as possible
			if(in_array($category['name'], $categories)) {
				# turn the category off
				$category['isEnabled'] = false;
			}

			# over-write the subChannel category with the updated category data
			$subChannel['categories'][$key]	= $category;
		}

		# ... and send the subChannel back
		return $subChannel['categories'];
	}

	/**
	 * update the preferences for districts
	 */
	public function setDistricts()
	{
		# if the user has not selected any districts to promote the array won't exist.
		# create it so we have something to work with.
		if(! isset($this->form['district'])) {
			$this->form['district'] = [];
		}

		# short cut the class preferences array so we don't have to write it out each time
		$districts = $this->preferences['districts'];

		# go through the main preferences object and set it accordingly
		foreach($districts AS $key => $district)
		{
			# if its in the form submission the user has opted into it. Set isPromoted = true
			$districts[$key]['isPromoted'] = in_array($district['id'], $this->form['district']);
		}

		# assign the updated districts array to the class wide preferences array
		$this->preferences['districts'] = $districts;
	}

	/**
	 * update the preferences for broadcasts. These are the user communication preferences
	 */
	public function setBroadcasts()
	{
		# if the user has not selected any broadcasts they are opting out of all comms.
		# this means the broadcasts array won't exist. create it so we have something to work 
		# with.
		if(! isset($this->form['broadcast'])) {
			$this->form['broadcast'] = [];
		}

		# short cut the class preferences array so we don't have to write it out each time
		$broadcasts = $this->preferences['broadcasts'];

		# go through the main preferences object and set it accordingly
		foreach($broadcasts AS $key => $broadcast)
		{
			# if its in the form submission the user has opted into it. Set isPromoted = true
			$broadcasts[$key]['isEnabled'] = in_array($broadcast['id'], $this->form['broadcast']);
		}

		# assign the updated districts array to the class wide preferences array
		$this->preferences['broadcasts'] = $broadcasts;
	}
}