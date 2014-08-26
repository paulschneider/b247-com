<?php

Class SessionsController extends BaseController {

	/**
	 * show the registration screen
	 * 
	 * @return View
	 */
	public function showRegistration()
	{
		# error vars, something went wrong!
		if(Session::has('registration-errors')) {
			$errors = Session::get('registration-errors')['errors'];
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
			$errors = Session::get('login-errors')['errors'];
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

			# and show the homepage
			return Redirect::route('profile');	
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
		else {
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
}