<?php
Route::group(array('before' => 'recordPevious'), function(){

	/*
	|--------------------------------------------------------------------------
	| Application Routes
	|--------------------------------------------------------------------------
	|
	| Here is where you can register all of the routes for an application.
	| It's a breeze. Simply tell Laravel the URIs it should respond to
	| and give it the Closure to execute when that URI is requested.
	|
	*/

	/*
	|--------------------------------------------------------------------------
	| Filter all routes first and save a variable in case we need to go 
	| back to a specific page (e.g after log in)
	|--------------------------------------------------------------------------
	|
	|
	*/

	/*
	|--------------------------------------------------------------------------
	| The B247 API calls this route to get the markup for articles to render 
	| within mobile devices and tables
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::post('app/article', 'ArticleController@getAppArticle');

	/*
	|--------------------------------------------------------------------------
	| Auth
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::post('login/auth', 'SessionsController@authenticate');
	Route::get('logout', [ 'as' => 'logout', 'uses' => 'SessionsController@logUserOut' ]);
	Route::get('login', [ 'as' => 'login', 'uses' => 'SessionsController@showLogIn' ]);

	/*
	|--------------------------------------------------------------------------
	| Register / Log-in / Profile
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('sign-up', [ 'as' => 'signup', 'uses' => 'SessionsController@showRegistration' ]); 
	Route::post('register/user', [ 'as' => 'register', 'uses' => 'SessionsController@registerNewUser' ]);
	Route::get('profile', [ 'as' => 'profile', 'uses' => 'UserController@showProfile' ]); 
	Route::post('profile', 'UserController@storeProfile'); 

	/*
	|--------------------------------------------------------------------------
	| Promotions
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('promotion/redeem/voucher/{code}', 'PromotionsController@redeemPromotion');
	Route::post('promotion/competition/enter', 'PromotionsController@competitionEntry');

	/*
	|--------------------------------------------------------------------------
	| Channel / Sub-channel
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('{channel}', 'ChannelController@showChannel');
	Route::get('{channel}/{subChannel}', 'ChannelController@showSubChannel');
	Route::get('{channel}/{subChannel}/page/{page}', 'ChannelController@showSubChannel')->where('page', '[0-9]+');
		
	/*
	|--------------------------------------------------------------------------
	| Listings
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('{channel}/{subChannel}/week/{time}', 'ChannelController@showListingSubChannel')->where('time', '[0-9]+');
	Route::get('{channel}/{subChannel}/day/{time}', 'ChannelController@showDayListingSubChannel')->where('time', '[0-9]+');	

	/*
	|--------------------------------------------------------------------------
	| Sub-channel / category
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('{channel}/{subChannel}/{category}', 'CategoryController@show');
	Route::get('{channel}/{subChannel}/{category}/{article}', 'ArticleController@show');

	/*
	|--------------------------------------------------------------------------
	| Home
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('/', [ 'as' => 'home', 'uses' => 'HomeController@showHomePage' ]);     
});   