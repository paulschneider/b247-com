<?php

class HomeController extends BaseController {

	/**
	 * show the the homepage
	 * 
	 * @return View
	 */
	public function showHomePage()
	{
		# call the API
		$response = App::make("ApiClient")->get("home");

		# if we got some data back successfully then do something with it
		if($response['success'])
		{
			# short cut the data response
			$data = $response['success']['data'];

			# if we don't have the nav stored in the session then store it
			if (! Session::has('nav') ) {
			    Session::put('nav', $data['channels']);
			}

			# set the browser page title
			$data['pageTitle'] = "Bristol news, what's on, food and drink, lifestyle";

			# set the pages meta description value
			$data['metaDescription'] = "Bristol news, comprehensive what's on listings, reviews and special offers online, on mobile, in print - check out our FREE app and monthly magazine";

			# make the view
			return View::make('home.index', $data);
		}
		else
		{

		}
	}
}