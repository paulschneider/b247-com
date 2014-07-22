<?php

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

	return Session::get('nav')['channels'];
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
