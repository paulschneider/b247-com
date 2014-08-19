<?php

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

Route::post('app/article', 'ArticleController@getAppArticle');

Route::post('login.auth', 'SessionsController@authenticate');
Route::get('logout', [ 'as' => 'logout', 'uses' => 'SessionsController@logUserOut' ]);
Route::get('login', [ 'as' => 'login', 'uses' => 'SessionsController@showLogIn' ]);

Route::group(array('before' => 'auth'), function()
{
	# register / log-in
	Route::get('sign-up', [ 'signup', 'uses' => 'SessionsController@register' ]); 

	# promotions
    Route::get('promotion/redeem/voucher/{code}', 'PromotionsController@redeemPromotion');
    Route::post('promotion/competition/enter', 'PromotionsController@competitionEntry');
	
	Route::get('{channel}', 'ChannelController@showChannel');
	Route::get('{channel}/{subChannel}', 'ChannelController@showSubChannel');
		
	# weeks listing subChannel
	Route::get('{channel}/{subChannel}/week/{time}', 'ChannelController@showListingSubChannel')->where('time', '[0-9]+');

	# day listing subChannel
	Route::get('{channel}/{subChannel}/day/{time}', 'ChannelController@showDayListingSubChannel')->where('time', '[0-9]+');	

	# paginated subChannel
	Route::get('{channel}/{subChannel}/page/{page}', 'ChannelController@showSubChannel')->where('page', '[0-9]+');
	Route::get('{channel}/{subChannel}/{category}', 'CategoryController@show');
	Route::get('{channel}/{subChannel}/{category}/{article}', 'ArticleController@show');
    Route::get('/', 'HomeController@showHomePage');        
});