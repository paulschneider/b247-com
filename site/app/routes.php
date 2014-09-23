<?php
Route::group(array('before' => 'recordPevious'), function(){

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
	Route::get('forgotten-password', [ 'as' => 'password', 'uses' => 'SessionsController@showPasswordResetForm' ]);
	Route::post('password/reset', [ 'as' => 'resetPassword', 'uses' => 'SessionsController@resetUserPassword' ]);

	/*
	|--------------------------------------------------------------------------
	| Contact Us
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('contact-us', [ 'as' => 'contact-us', 'uses' => 'ContactController@showContactForm' ]);
	Route::post('contact-us', [ 'as' => 'contact-us', 'uses' => 'ContactController@submitNewEnquiry' ]);

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
	Route::get('your-b247', 'UserController@showPreferences');
	Route::post('your-b247', 'UserController@storePreferences'); 
	Route::get('change-my-password', 'UserController@showChangePassword'); 
	Route::post('password/change', 'UserController@changeUserPassword'); 

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
	| Search
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('search', 'SearchController@showResultsPage');
	Route::get('search/page/{page}', 'SearchController@search');
	Route::post('search', 'SearchController@search');

	/*
	|--------------------------------------------------------------------------
	| Statics
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('download-the-app', 'PagesController@appDownload');
	Route::get('about-us', 'PagesController@aboutUs');
	Route::get('advertise', 'PagesController@advertise');
	Route::get('terms-and-conditions', 'PagesController@terms');
	Route::get('privacy-policy', 'PagesController@privacy');
	Route::get('cookie-policy', 'PagesController@cookie');
	
	/*
	|--------------------------------------------------------------------------
	| Channel / Sub-channel
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::group(['prefix' => 'channel'], function() {
		Route::get('{channel}', 'ChannelController@showChannel');
		Route::get('{channel}/{subChannel}', 'ChannelController@showSubChannel');
		Route::get('{channel}/{subChannel}/page/{page}', 'ChannelController@showSubChannel')->where('page', '[0-9]+');
	});
	/*
	|--------------------------------------------------------------------------
	| Listings
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::group(['prefix' => 'channel'], function() {
		Route::get('{channel}/{subChannel}/week/{time}', 'ChannelController@showListingSubChannel')->where('time', '[0-9]+');
		Route::get('{channel}/{subChannel}/day/{time}', 'ChannelController@showDayListingSubChannel')->where('time', '[0-9]+');	
	});

	/*
	|--------------------------------------------------------------------------
	| Sub-channel / category
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::group(['prefix' => 'channel'], function() {
		Route::get('{channel}/{subChannel}/{category}', 'CategoryController@show');
		Route::get('{channel}/{subChannel}/{category}/page/{page}', 'CategoryController@show');		
		Route::get('{channel}/{subChannel}/{category}/{article}', 'ArticleController@show');	
		Route::get('{channel}/{subChannel}/{category}/{article}/comments', 'ArticleController@getArticleComments');	
	});	

	/*
	|--------------------------------------------------------------------------
	| Home
	|--------------------------------------------------------------------------
	|
	|
	*/
	Route::get('/', [ 'as' => 'home', 'uses' => 'HomeController@showHomePage' ]);  

	/*
	|--------------------------------------------------------------------------
	| No route found
	|--------------------------------------------------------------------------
	| This final route, if reached, means the user is trying to access a route that doesn't
	| exist.
	|
	*/  

	App::missing(function($exception)
	{
	    return Response::view('errors.missing', ['nav' => getApplicationNav()], 404);
	});
	
});   