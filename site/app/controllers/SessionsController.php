<?php

Class SessionsController extends BaseController {

	public function showLogIn()
	{
		return View::make('login.index');
	}	

	public function authenticate()
	{
		$input = Input::only('email', 'password');

		$email = $input['email'];
		$password = $input['password'];

		if (Auth::attempt( [ 'email' => $email, 'password' => $password ] , true))
		{
		    return Redirect::to('/');
		}
		else
		{
			return Redirect::to('login')->withInput(Input::except('password'));
		}
	}

	public function logUserOut()
	{
		Auth::logout();

		return Redirect::to('/');
	}
}