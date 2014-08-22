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
			
			# make the view
			return View::make('home.index', $data);
		}
	}
}