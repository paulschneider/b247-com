<?php

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
