<?php

Class SessionsController extends BaseController {

	/**
	 * show the registration screen
	 * 
	 * @return View
	 */
	public function showRegistration()
	{
		# if the user is already authenticated then they can't register and they can't log in
		# so get them out of here.
		if( userIsAuthenticated() ) {
			return Redirect::to('profile');
		}

		# if we get here then forget the redirect value as the user has used the global sign in link
		# and we won't need to take them anywhere specific after authentication
		Session::forget('redirect');

		# error vars, something went wrong!
		if(Session::has('registration-errors')) {
			$errors = reformatErrors(Session::get('registration-errors')['errors']);
			$message = Session::get('registration-errors')['public'];
			$messageClass = "danger";

			# grab the old form data
			$input = Input::old();
		}

		# there are two forms on the page, this is a simple way of targetting them
		$form = "registration";

		return View::make('register.index', compact('errors', 'message', 'messageClass', 'input', 'form'));
	}

	/**
	 * show the log in screen
	 * 
	 * @return View
	 */
	public function showLogIn()
	{
		$redirect = null;

		# error vars, something went wrong!
		if(Session::has('login-errors')) {

			# there might be specific validation errors
			if(Session::has('login-errors')['errors']) {
				$errors = reformatErrors(Session::get('login-errors')['errors']);	
			}
			
			$message = Session::get('login-errors')['public'];
			$messageClass = "danger";

			# grab the old form data
			$input = Input::old();
		}

		if(Session::has('previousPage')) {
			$redirect = Session::get('previousPage');
		}

		# there are two forms on the page, this is a simple way of targetting them
		$form = "login";

		return View::make('register.index', compact('redirect', 'form', 'errors', 'message', 'messageClass'));
	}

	/**
	 * attempt to authenticate security credentials for a user
	 * 
	 * @return Redirect
	 */
	public function authenticate()
	{
		# make the call to the API
		$response = App::make('ApiClient')->post('login', Input::only('email', 'password'));

		# if the user was authenticated
		if(isset($response['success']))
		{	
			# save the returned user object to the session for later use
			User::startSession($response['success']['data']['user']);

			if(Input::get('redirect')) {
				return Redirect::to(Input::get('redirect'));
			}

			# and show the profile page
			return Redirect::to('profile');	
		}
		# auth failed. return to the log in screen and display an error
		else 
		{ 

			# save the API response to some flash data
			Session::flash('login-errors', getErrors($response));

			# also flash the input so we can replay it out onto the reg form again
			Input::flash();

			# ... and show the log in page again
			return Redirect::to('login');
		}
	}	

	/**
	 * make a call to the API to register a new user
	 * 
	 * @return Redirect
	 */
	public function registerNewUser()
	{
		# make the call to the API
		$response = App::make('ApiClient')->post('register', Input::all());

		# if we successfully register a new user
		if(isset($response['success']))
		{
			User::startSession($response['success']['data']['user']);

			# if we were asked to redirect back to a specific page
			if(Input::get('redirectBack')) {
				return Redirect::route('profile');				
			}

			# show the user profile screen
			return Redirect::route('profile');
		}
		# there was a problem registering the user
		else 
		{
			# save the API response to some flash data
			Session::flash('registration-errors', getErrors($response));

			# also flash the input so we can replay it out onto the reg form again
			Input::flash();

			# ... and show the sign up form again
			return Redirect::to('sign-up');
		}
	}

	/**
	 * log an authenticated user out of their account and return them to the homepage
	 * 
	 * @return Redirect
	 */
	public function logUserOut()
	{
		Session::flush();
		Session::regenerate();

		return Redirect::home();
	}

	/**
	 * show the template for a user to request a password reset
	 * 
	 * @return View
	 */
	public function showPasswordResetForm()
	{
		# if we get here then forget the redirect value as the user will presumably always want to go back to 
		# the log-in screen after requesting a password reset
		Session::forget('redirect');

		# the enquiry submission went well
		if(Session::has('success')) {
			# set some success vars
			$message = Session::get('success')['public'];
			$messageClass = "success";
		}

		# error vars, something went wrong!
		if(Session::has('reset-errors')) 
		{	
			# some error responses come back without a validation errors array
			if(isset(Session::get('reset-errors')['errors'])) {
				$errors = reformatErrors(Session::get('reset-errors')['errors']);
			}
			
			$message = Session::get('reset-errors')['public'];
			$messageClass = "danger";

			# grab the old form data
			$input = Input::old();
		}

		return View::make('auth.password-reset', compact('errors', 'message', 'messageClass', 'input'));
	}
	/**
	 * Make an API call to request a new password be sent to the user
	 * 
	 * @return Redirect
	 */
	public function resetUserPassword()
	{
		# make the call to the API
		$response = App::make('ApiClient')->post('user/password?forgotten=true', Input::only('email'));	

		# if the call was successful we'll want to give some feedback to the user
		if(isset($response['success']))
		{
			Session::flash('success', $response['success']['data']);
		}
		# similarly if it failed, but this time also show the previous form data
		else {
			# save the API response to some flash data
			Session::flash('reset-errors', getErrors($response));

			# also flash the input so we can replay it out onto the reg form again
			Input::flash();
		}		

		# ... and show the reset form again
		return Redirect::to('forgotten-password');
	}
}