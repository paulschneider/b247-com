<?php

Class SessionsController extends BaseController {

	/**
	 * show the log in screen
	 * 
	 * @return View
	 */
	public function showLogIn()
	{
		$redirect = null;

		# if the user is already authenticated then they can't register and they can't log in
		# so get them out of here.
		if( userIsAuthenticated() ) {
			return Redirect::to('profile');
		}

		# error vars, something went wrong!
		if(Session::has('login-errors')) 
		{	
			$errors = Session::get('login-errors');
			# there might be specific validation errors
			if(isset($errors['errors'])) {
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

		# indicate what we're on to the view. This is used to prevent the auth/register pop up
		# when viewing these pages
		$page = "login";

		return View::make('auth.log-in', compact('redirect', 'form', 'errors', 'message', 'messageClass', 'page'));
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

			# we got here from a redirect. if they came via a new account registration then reflash the 
			# session so we can use the data on the next page load
			if(Session::has('success')) {
				Session::reflash();
			}			

			if(Input::get('redirect') && ! Session::has('ignoreRedirect')) {
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
		Session::forget('previousPage');

		# error vars, something went wrong!
		if(Session::has('registration-errors')) {
			$errors = reformatErrors(Session::get('registration-errors')['errors']);
			$message = Session::get('registration-errors')['public'];
			$messageClass = "danger";

			# grab the old form data
			$input = Input::old();
		}

		# indicate what we're on to the view. This is used to prevent the auth/register pop up
		# when viewing these pages
		$page = "register";

		return View::make('register.index', compact('errors', 'message', 'messageClass', 'input', 'form', 'page'));
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

			# grab the data array from the response
			Session::flash('success', $response['success']['data']);

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
			return Redirect::back();
		}
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
		Session::put('ignoreRedirect', true);

		# the reset request succeeded
		if(Session::has('success')) 
		{
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

	/**
	 * log an authenticated user out of their account and return them to the homepage
	 * 
	 * @return Redirect
	 */
	public function logUserOut()
	{
		# destroy the session
		Session::flush();

		# generate a new session ID
		Session::regenerate();

		# ... and show the homepage
		return Redirect::home();
	}
}