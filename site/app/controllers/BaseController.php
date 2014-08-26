<?php

class BaseController extends Controller {

	public function __construct()
	{
		# Make sure all views have access to the application nav data
		View::composer('*', function($view)
		{
		    $view->with('nav', getApplicationNav());
		});

		View::share('errors', null);
		View::share('message', null);
		View::share('messageClass', null);
	}

	/**
	 * if we get an API response that we need to feed back to the user then process it
	 * 
	 * @param  array $responseData 	[response object as returned by the API call]
	 * @param  string $message      [which language file do we want to use for the messaging]
	 * @return Redirect
	 */
	public function respond($responseData, $message)
	{
		# if its a success get the success code
		if(isset($responseData['error'])) {
			$statusCode = (int) $responseData['error']['statusCode'];			
		}
		# if it was successful then use that object
		else {
			$statusCode = (int) $responseData['success']['statusCode'];	
		}

		# set a message in the flash data
		Session::flash('message', Lang::get($message)[$statusCode]);

		# and redirect back to the page we just came from
		return Redirect::back();		
	}
}