<?php

Class UserController extends BaseController {

	public function showProfile()
	{
		if( ! userIsAuthenticated() ) 
		{
			Session::flash('redirectPath', Session::get('previousPage'));

			sd(Session::all());

			return Redirect::to('login');
		}

		$user = Session::get('user');

		return View::make('user.profile', compact('user'));
	}
}