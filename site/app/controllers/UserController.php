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
		if(Session::has('error')) {
			# set some error vars
			$errors = reformatErrors(Session::get('error')['errors']);
			$message = Session::get('error')['public'];
			$messageClass = "danger";

			# grab the old form data
			$input = Input::old();
		}

		# cleanup (any session data created through log in or registration) - helpers.php		
		cleanup();

		# which sub-nav option do we want to make active
		$activeNav = "profile";

		$showAccountNav = true;

		# send the data to the view and render!
		return View::make('user.profile', compact('message', 'messageClass', 'activeNav', 'showAccountNav'));
	}

	/**
	 * update an existing profile with new user input
	 * 
	 * @return Redirect
	 */
	public function storeProfile()
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

		# make the call to the API
		$response = App::make('ApiClient')->post('user/profile', Input::all(), [ 'accessKey' => Session::get('user.accessKey') ]);

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

	/**
	 * show the user preferences page
	 * 
	 * @return View
	 */
	public function showPreferences()
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

		$response = App::make("ApiClient")->get('user/preferences', ['accessKey' => getAccessKey()]);

		# the call to the APU was successful and we got the list of user
		# preferences back
		if(isset($response['success']))
		{
			# save it 
			$data = $response['success']['data'];

			# and to the session so we can retrieve it if they want to update any 
			# of their preferences
			Session::put('preferences', $data);
		}

		# the enquiry submission went well
		if(Session::has('success')) {
			# set some success vars
			$data['message'] = Session::get('success')['public'];
			$data['messageClass'] = "success";			
		}

		# there was an issue submitting the enquiry
		elseif(Session::has('error')) {
			# set some error vars
			$data['message'] = Session::get('error')['public'];
			$data['messageClass'] = "danger";
		}

		$data['activeNav'] = "prefs";

		$data['showAccountNav']= true;

		return View::make('user.preferences', $data);
	}

	/**
	 * process and pass updated user preferences to the API for storage
	 * 
	 * @return Redirect
	 */
	public function storePreferences()
	{
		# retrieve the user' preferences from the session
		if(Session::has('preferences')) {
			$preferences = Session::get('preferences');
		}
		# for some reason they aren't there, so grab them from the API again.
		else {
			// to do
		}

		$preferences = json_encode(App::make('Bristol247\Tools\UserPreferenceOrganiser')->set($preferences, Input::all()));

		# POST the submitted and processed data to the API
		$response = App::make("ApiClient")->post("user/preferences", [$preferences], ['accessKey' => getAccessKey()]);

		if(isset($response['success']))
		{
			# store the success data in the session so we can use it on the next page load
			Session::flash('success', $response['success']['data']);
		}
		else
		{
			# save the error response to the session
			Session::flash('error', $response['error']['data']);	
		}

		return Redirect::back();
	}

	/**
	 * show the form to allow the user to change their password
	 * 
	 * @return View
	 */
	public function showChangePassword()
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

		# the submission went well
		if(Session::has('success')) {
			# set some success vars
			$data['message'] = Session::get('success')['public'];
			$data['messageClass'] = "success";			
		}

		# something went wrong
		elseif(Session::has('error')) {
			# set some error vars
			$error = Session::get('error');
			if(isset($error['errors'])) {
				$data['errors'] = reformatErrors($error['errors']);		
			}

			$data['message'] = $error['public'];
			$data['messageClass'] = "danger";
		}

		# which sub-nav option do we want to make active
		$data['activeNav'] = "password";

		$data['showAccountNav']= true;

		cleanup();

		# send the data to the view and render!
		return View::make('user.password')->with($data);
	}

	/**
	 * process the submission of a user password change request
	 * 
	 * @return Redirect
	 */
	public function changeUserPassword()
	{
		$data = [
			'email' => Session::get('user.email'),
			'password' => Input::get('password'),
			'newPassword' => Input::get('newPassword'),
		];

		# POST the submitted data to the API
		$response = App::make("ApiClient")->post("user/password", $data, ['accessKey' => getAccessKey()]);

		if(isset($response['success']))
		{
			# store the success data in the session so we can use it on subsequent page loads
			Session::put('user', $response['success']['data']['user']);

			# flash the session with some data so we can provide feedback to the user
			Session::flash('success', $response['success']['data']);
		}
		else
		{
			# save the error response to the session
			Session::flash('error', $response['error']['data']);	
		}
		
		# ... redirect back to the form
		return Redirect::back();
	}
}