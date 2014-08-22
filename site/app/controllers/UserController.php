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

		# when authenticated the user is saved to the session. Get the data
		$user = Session::get('user');

		# send the data to the view and render!
		return View::make('user.profile', compact('user'));
	}

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
			# set a message in the flash data
			Session::flash('message', Lang::get('system_messages.userProfileUpdated'));		
		}
		else {
			return Redirect::back()->withErrors([ $response['error']['data']['errors'] ]);
		}

		# and redirect back to the page we just came from
		return Redirect::back();
	}
}