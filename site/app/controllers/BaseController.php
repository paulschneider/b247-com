<?php

class BaseController extends Controller {

	public function __construct()
	{
		# Make sure all views have access to the application nav data
		View::composer('*', function($view)
		{
			# all views need the nav, so grab it
		    $view->with('nav', getApplicationNav());

		    # when authenticated the user is saved to the session. Get the data
			if(Session::has('user')) {
				$view->with('user', Session::get('user'));
			}

			# when authenticated the user is saved to the session. Get the data
			if(Session::has('previousPage')) {
				$view->with('previousPage', Session::get('previousPage'));
			}
		});

		# variable defaults for the views
		View::share('page', null);
		View::share('errors', null);
		View::share('message', null);
		View::share('messageClass', null);
		View::share('activeNav', null);
		View::share('apiKey', null);
	}

	/**
	 * if we get an API response that we need to feed back to the user - process it
	 * 
	 * @param  array $responseData 	[response object as returned by the API call]
	 * @return Redirect
	 */
	public function respond($responseData)
	{
		# if we have an error in the response object
		if(isset($responseData['error']))		
		{
			# grab the status code from the response
			$statusCode = $responseData['error']['statusCode'];

			# depending on the status code received, do something
			switch($statusCode)
			{
				# resource not found
				case 404 :
					return Response::view('errors.missing', ['nav' => getApplicationNav()], 404);
				case 424 :
					return Response::view('errors.satisfactionFailure', ['nav' => getApplicationNav()], 424);
				break;
			}
		}
		# there's a real issue if we don't get a success or error from the API. 
		# Just show the home page in this case.
		else 
		{
			# log the error (custom function - helpers.php)
			logApiFailure("API didn't return a SUCCESS or ERROR object. This is really bad!!!");

			# ... show the homepage
			return Redirect::home();
		}
	}
}