<?php

Class PagesController extends BaseController {
	
	/**
	 * show the 'download the app' page
	 * 
	 * @return View
	 */
	public function appDownload()
	{
		# grab the data for the page
		return $this->getContent("download");
	}

	/**
	 * show the about us page
	 * 
	 * @return View
	 */
	public function aboutUs()
	{
		# grab the data for the page
		return $this->getContent("about");	
	}

	/**
	 * show the advertise page
	 * 
	 * @return View
	 */
	public function advertise()
	{
		# grab the data for the page
		return $this->getContent("advertise");	
	}

	/**
	 * show the T&C page
	 * 
	 * @return View
	 */
	public function terms()
	{
		# grab the data for the page
		return $this->getContent("terms-conditions");
	}

	/**
	 * show the privacy policy page
	 * 
	 * @return View
	 */
	public function privacy()
	{
		# grab the data for the page
		return $this->getContent("privacy_policy");	
	}

	/**
	 * make a call to the API to retrieve content for a specified page
	 * 
	 * @param  string $pageSefName [search engine friendly name for the article]
	 * @return array on success | Response on failure
	 */
	private function getContent($pageSefName)
	{
		# call the API with the required parms
		$response = App::make("ApiClient")->get("articles", ['article' => $pageSefName, 'static' => true]);

		# it was successful, so send the data (article) back 
		if(isset($response['success']))
		{
			return View::make('statics.index')->with($response['success']['data']['article']);
		}
		# it failed, so handle the error response
		else
		{
			return parent::respond($response);
		}
	}
}