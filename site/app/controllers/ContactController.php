<?php

Class ContactController extends BaseController {

	/**
	 * display the contact enquiry form
	 * 
	 * @return View
	 */
	public function showContactForm()
	{
		$errors = null;
		$message = null;
		$messageClass = null;		
		$input = Input::all();

		# there was an issue submitting the enquiry
		if(Session::has('error')) {
			# set some error vars
			if(isset(Session::get('error')['errors']))
			{
				$errors = reformatErrors(Session::get('error')['errors']);	
			}
			
			$message = Session::get('error')['public'];
			$messageClass = "danger";

			# grab the old form data
			$input = Input::old();
		}

		# the enquiry submission went well
		if(Session::has('success')) {
			# set some success vars
			$message = Session::get('success')['public'];
			$messageClass = "success";
		}

		$pageTitle = "Contact Us";

		# ... show the form
		return View::make('contact.index', compact('message', 'errors', 'messageClass', 'input', 'pageTitle'));
	}

	/**
	 * process the submission of a new contact enquiry
	 * 
	 * @return Redirect
	 */
	public function submitNewEnquiry()
	{
		# POST the submitted data to the API
		$response = App::make("ApiClient")->post("contact-enquiry", Input::all());

		# if we successfully submit a new enquiry
		if(isset($response['success'])) {
			Session::flash('success', $response['success']['data']);
		}
		# otherwise there was a problem so report it
		else {
			Session::flash('error', $response['error']['data']);	
		}

		# flash the form data to the session so we can grab it after the redirect
		Input::flash();
		
		# ... redirect back to the form
		return Redirect::to('contact-us');
	}
}