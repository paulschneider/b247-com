<?php
use Carbon\Carbon;

function getListingInWeek($listOfDays, $week)
{
	return getEventDate($listOfDays[$week]['publication']['epoch']);
}

function displayStyle($content)
{
	return $content['displayStyle'];
}

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
	$dt->month = $months[$date->month-1];
	$dt->day = $date->day;
	$dt->time = $date->format('H:i');
	$dt->year = $date->year;
	$dt->dateStamp = $date->toDateString();
	$dt->timeStamp = $timestamp;
	$dt->daysInMonth = $date->daysInMonth;
	$dt->lastMonth = $date->subDays($dt->day)->subMonths(1)->timestamp;
	$dt->nextMonth = $date->addDays($dt->day + ($dt->daysInMonth-$dt->day))->addMonths(1)->timestamp;
	
	return $dt;
}

function getDailyTimestamp($date, $dayNumber)
{
	$dateTime = Carbon::createFromTimeStamp($date->timeStamp);
	$dateTime->timezone = new DateTimeZone('Europe/London');

	if($dayNumber < $date->day) { 
		$newDate = $dateTime->subDays( $date->day-$dayNumber )->timestamp;	
	}
	elseif($dayNumber > $date->day) {
		$newDate = $dateTime->addDays( $dayNumber - $date->day )->timestamp;
	}
	else{
		$newDate = $dateTime->timestamp;
	}

	return $newDate;
}

function getNewTimestamp($date, $symbol, $amount)
{
	return strtotime($date->dateStamp. ' '.$symbol.' '.$amount); 
}

function dateFormat($date)
{
	return date('Y-m-d', strtotime($date));
}

function getChannelSubChannels($channels, $channelToFind)
{
	foreach($channels AS $channel)
	{
		if($channel['sefName'] == $channelToFind)
		{
			return $channel['subChannels'];
		}
	}
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

function getChannelPath($channel)
{
	return baseUrl().$channel['path'];
}

function getChannelType($channel)
{
	return $channel['subChannels'][0]['displayType']['type'];
}

function getApplicationNav()
{
	// if ( ! Session::has('nav') )
	// {
	// 	Session::put('nav', Api::get("app/nav")['channels']);		
	// }

	return Api::get("app/nav")['channels'];
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

function getTheme($article)
{
	return isset($article['assignment']) ? themeClass($article['assignment']['channel']['sefName']) : '';
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

function baseUrl()
{
	return URL::to('/').'/';
}

function current_url()
{
	return Request::url();
}

// shortcut for show_data function
function sd($data)
{
    echo "<pre>";
        print_r($data);
    echo "</pre>";
    exit;
}
