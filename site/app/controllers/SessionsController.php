<?php

Class SessionsController extends BaseController {

	/**
	 * show the registration screen
	 * 
	 * @return View
	 */
	public function showRegistration()
	{
		return View::make('register.index');
	}

	/**
	 * show the log in screen
	 * 
	 * @return View
	 */
	public function showLogIn()
	{
		$redirect = null;

		if(Session::has('previousPage')) {
			$redirect = Session::get('previousPage');
		}

		return View::make('register.index', compact('redirect'));
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
		else { 
			return Redirect::to('login')->withErrors(getErrorMessage($response), 'message');
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
			return Redirect::to('signup')->withErrors(getErrors($response), 'register');
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