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

Route::group(array('before' => 'auth'), function()
{
    Route::get('/', 'HomeController@showHomePage');
});

Route::post('login.auth', 'SessionsController@authenticate');
Route::get('logout', [ 'as' => 'logout', 'uses' => 'SessionsController@logUserOut' ]);
Route::get('login', [ 'as' => 'login', 'uses' => 'SessionsController@showLogIn' ]);
