<?php namespace Bristol247\Api\Client;

use Illuminate\Support\Facades\Facade;

Class ApiFacade extends Facade {

	public static function getFacadeAccessor()
	{
		return "Api";
	}

}