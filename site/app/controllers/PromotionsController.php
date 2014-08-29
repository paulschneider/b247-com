<?php

Class PromotionsController extends BaseController {

	/**
	 * validate and redeem a promotional voucher
	 * 
	 * @param  string $code [the promotion code to redeem]
	 * @return mixed       	[API response]
	 */
	public function redeemPromotion($code)
	{
		# ensure the user has logged in
		if( ! userIsAuthenticated() ) {
			Redirect::to('/login?redirectBack='.current_url());
		}

		# make the call to the API
		$response = App::make('ApiClient')->post('user/promotion/redeem', ['accessKey' => getAccessKey(), 'code' => $code]);
		
		# grab the response
		if(isset($response['success'])) {
			# successful
			Session::flash('success', $response['success']['data']);
		}
		else {
			# it failed
			Session::flash('error', $response['error']['data']);	
		}

		# do something with the response. Send the response data as well as the name of the language file to use for messaging
		return Redirect::back();
	}

	/**
	 * Process and enter a user into a promotional competition
	 * 
	 * @return mixed [API response]
	 */
	public function competitionEntry()
	{
		# ensure the user has logged in
		if( ! userIsAuthenticated()) {
			Redirect::to('/login?redirectBack='.current_url());
		}

		# check to see that we have a competition answer
		if( ! Input::get('answer') ) {
			Session::flash('message', 'Fill in the form!!');
			return Redirect::back();
		}

		$postData = [
			'accessKey' => getAccessKey(),
			'competitionId' => Input::get('competitionId'),
			'answerId' => Input::get('answer')
		];

		# make the call to the API
		$response = App::make('ApiClient')->post('user/competition/enter', $postData);

		# do something with the response. Send the response data as well as the name of the language file to use for messaging
		return parent::respond($response, 'api_competitionResponses');	
	}
}