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
		if( ! Auth::check()) {
			Redirect::to('/login?redirectBack='.current_url());
		}

		# grab the user
		$user = Auth::user();

		# make the call to the API
		$response = App::make('ApiClient')->post('user/promotion/redeem', ['accessKey' => 'B1931152F2D30C4', 'code' => $code]);

		# do something with the response. Send the response data as well as the name of the language file to use for messaging
		return parent::respond($response, 'api_promotionsResponses');		
	}

	/**
	 * Process and enter a user into a promotional competition
	 * 
	 * @return mixed [API response]
	 */
	public function competitionEntry()
	{
		# ensure the user has logged in
		if( ! Auth::check()) {
			Redirect::to('/login?redirectBack='.current_url());
		}

		# grab the user
		$user = Auth::user();

		# check to see that we have a competition answer
		if( ! Input::get('answer') ) {
			Session::flash('message', 'Fill in the form!!');
			return Redirect::back();
		}

		$postData = [
			'accessKey' => 'B1931152F2D30C4',
			'competitionId' => Input::get('competitionId'),
			'answerId' => Input::get('answer')
		];

		# make the call to the API
		$response = App::make('ApiClient')->post('user/competition/enter', $postData);

		# do something with the response. Send the response data as well as the name of the language file to use for messaging
		return parent::respond($response, 'api_competitionResponses');	
	}
}