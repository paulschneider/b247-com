<?php

Class UserController extends BaseController {

	/**
	 * show the user account profile screen
	 * 
	 * @return View
	 */
	public function showProfile()
	{
		# if there is no authenticated user return them to the log in screen
		if( ! userIsAuthenticated() ) 
		{
			# save the current path as the redirect path so the system brings us back here
			# after the authentication is successful
			Session::flash('redirectPath', Session::put('previousPage', URL::current()));

			# and redirect to the login screen
			return Redirect::to('login');
		}

		# the enquiry submission went well
		if(Session::has('success')) {
			# set some success vars
			$message = Session::get('success')['public'];
			$messageClass = "success";			
		}

		# there was an issue submitting the enquiry
		elseif(Session::has('error')) {
			# set some error vars
			$errors = reformatErrors(Session::get('error')['errors']);
			$message = Session::get('error')['public'];
			$messageClass = "danger";

			# grab the old form data
			$input = Input::old();
		}			

		# send the data to the view and render!
		return View::make('user.profile', compact('message', 'messageClass'));
	}

	/**
	 * update an existing profile with new user input
	 * 
	 * @return Redirect
	 */
	public function storeProfile()
	{
		$input = Input::all();

		# format the data into the structure the API needs
		$data = [
			"firstName" => $input['firstName'],
			"lastName" => $input['lastName'],
			"email" => $input['email'],
			"postCode" => $input['postCode'],
			"ageGroup" => $input['ageGroup']
		];

		# make the call to the API
		$response = App::make('ApiClient')->post('user/profile', $data, [ 'accessKey' => Session::get('user.accessKey') ]);

		# if the user profile was saved
		if(isset($response['success'])) {

			# save the returned user object to the session for later use
			User::startSession($response['success']['data']['user']);

			# store the success data in the session so we can use it on the next page load
			Session::flash('success', $response['success']['data']);

			# and redirect back to the page we just came from
			return Redirect::to('profile');
		}
		else 
		{
			# save the error response to the session
			Session::flash('error', $response['error']['data']);	

			# flash the form data to the session so we can grab it after the redirect
			Input::flash();

			# ... redirect back to the form
			return Redirect::to('profile');
		}
	}
}