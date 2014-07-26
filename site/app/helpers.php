<?php

use Carbon\Carbon;

function getEventDate($timestamp)
{
	$days = [
		0 => [ 'full' => 'Sunday', 'short' => 'Sun' ],
		1 => [ 'full' => 'Monday', 'short' => 'Mon' ],
		2 => [ 'full' => 'Tuesday', 'short' => 'Tue' ],
		3 => [ 'full' => 'Wednesday', 'short' => 'Wed' ],
		4 => [ 'full' => 'Thursday', 'short' => 'Thur' ],
		5 => [ 'full' => 'Friday', 'short' => 'Fri' ],
		6 => [ 'full' => 'Saturday', 'short' => 'Sat' ],
	];

	$months = [
		0 => [ 'full' => 'January', 'short' => 'Jan' ],
		1 => [ 'full' => 'February', 'short' => 'Feb' ],
		2 => [ 'full' => 'March', 'short' => 'Mar' ],
		3 => [ 'full' => 'April', 'short' => 'Apr' ],
		4 => [ 'full' => 'May', 'short' => 'May' ],
		5 => [ 'full' => 'June', 'short' => 'Jun' ],
		6 => [ 'full' => 'July', 'short' => 'Jul' ],
		7 => [ 'full' => 'August', 'short' => 'Aug' ],
		8 => [ 'full' => 'September', 'short' => 'Sept' ],
		9 => [ 'full' => 'October', 'short' => 'Oct' ],
		10 => [ 'full' => 'November', 'short' => 'Nov' ],
		11 => [ 'full' => 'December', 'short' => 'Dec' ],
	];

	$date = Carbon::createFromTimeStamp($timestamp);
	$date->timezone = new DateTimeZone('Europe/London');
	
	$dt = new stdClass();

	$dt->dayOfWeek = $days[$date->dayOfWeek];
	$dt->month = $months[$date->month];
	$dt->day = $date->day;
	$dt->time = $date->format('H:i');
	
	return $dt;
}

function dateFormat($date)
{
	return date('Y-m-d', strtotime($date));
}

function getCategoryPath($channel)
{
	return $channel['subChannels'][0]['categories'][0]['path'];
}

function getCategoryName($channel)
{
	return $channel['subChannels'][0]['categories'][0]['name'];
}

function getSubChannelName($channel)
{
	return $channel['subChannels'][0]['name'];
}

function getArticleSubChannel($article)
{
	$data = new stdClass();

	$data->name = $article['assignment']['subChannel']['name'];
	$data->path = $article['assignment']['subChannel']['path'];
	
	return $data;
}

function getArticleCategory($article)
{
	$data = new stdClass();
	$data->name = $article['assignment']['category']['name'];
	$data->path = $article['assignment']['category']['path'];
	
	return $data;
}

function getSubChannelPath($channel)
{
	return $channel['subChannels'][0]['path'];
}

function getChannelName($channel)
{
	return $channel['name'];
}

function getChannelType($channel)
{
	return $channel['subChannels'][0]['displayType']['type'];
}

function getApplicationNav()
{
	if ( ! Session::has('nav') )
	{
		Session::put('nav', Api::get("app/nav"));		
	}

	return Session::get('nav');
}

function getFeatureCategories($features)
{
	$response = [];

	foreach( $features AS $feature )
	{
		$response[] = [
			'name' => $feature['assignment']['category']['name'],
			'path' => $feature['assignment']['category']['path']
		];
	}

	return $response;
}

function themeClass($section)
{
	$themes = [
		'news-comment' => 'themeNews',
		'culture' => 'themeCulture',
		'whats-on' => 'themeWhats',
		'food-drink' => 'themeFood',
		'lifestyle' => 'themeLife',
	];

	return $themes[$section];
}

function assetPath()
{
	return "/";
}

// shortcut for show_data function
function sd($data)
{
    echo "<pre>";
        print_r($data);
    echo "</pre>";
    exit;
}
