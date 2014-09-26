<?php
use Carbon\Carbon;

function getPublishedDate($date)
{
	$date = getEventDate(strtotime($date));

	return $date->month['full'].' '.$date->day.', '.$date->fullYear;
}

function cleanup()
{
	Session::forget('registration-errors');
	Session::forget('login-errors');
	Session::forget('ignoreRedirect');
	Session::forget('error');
}

function getErrorMessage($data)
{
	return $data['error']['data']['public'];
}

function getErrors($data)
{
	return $data['error']['data'];
}

function isError($item, $errors)
{
	if(is_array($errors) && count($errors) > 0) {
		return array_key_exists($item, $errors);	
	}

	return false;	
}

/**
 * Turn the "complex" error array returned by the API into a simple k-v-p array
 * 
 * @param  array $errors [an array of error arrays]
 * @return array $tmp
 */
function reformatErrors($errors)
{
	$tmp = [];

	foreach($errors AS $error)
	{
		$tmp[$error['field']] = $error['message'];
	}

	return $tmp;
}

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

function logApiFailure($message)
{
	$logFile = 'apiFails.log';

	$view_log = new Logger('View Logs');
	$view_log->pushHandler(new StreamHandler(storage_path().'/logs/'.$logFile, Logger::INFO));

	$view_log->addInfo($message);
}

function logApiCall($endpoint)
{	
	$logFile = 'apiCalls.log';

	$view_log = new Logger('View Logs');
	$view_log->pushHandler(new StreamHandler(storage_path().'/logs/'.$logFile, Logger::INFO));

	$view_log->addInfo($endpoint);
}

function clog($data)
{
	$logFile = 'console.log';

	$view_log = new Logger('View Logs');
	$view_log->pushHandler(new StreamHandler(storage_path().'/logs/'.$logFile, Logger::INFO));

	$view_log->addInfo($data);	
}

function userIsAuthenticated()
{
    if( array_key_exists('accessKey', getallheaders()) || Session::has('user.accessKey') || Request::header("accessKey"))
    {
        return true;
    }

    return false;
}

function getAccessKey()
{
	if(Request::header("accessKey"))
    {
        return Request::header("accessKey");
    }
    elseif(Session::has('user.accessKey'))
    {
        return Session::get('user.accessKey');
    }
    else
    {
        return false;
    }
}

function anExternalUrl($string)
{
    $protocols = [ 'http://', 'https://' ];

    foreach($protocols AS $protocol)
    {
        if(strpos($string, $protocol) !== false)
        {
            return true;
        }
    }    
}

function getStartDay($days)
{
	$date = Carbon::createFromTimeStamp($days[0]['publication']['epoch']);
	$date->timezone = new DateTimeZone('Europe/London');

	return $date->format('m/d/Y');
}

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
	$dt->monthNumber = $date->format('m');
	$dt->day = $date->format('j');
	$dt->time = $date->format('H:i');
	$dt->year = $date->year;
	$dt->shortYear = $date->format('y');
	$dt->fullYear = $date->format('Y');
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

# create a string showing the path to the current site page. Used in the browser tab / title bar
function getPageTitle($data)
{
	$str = "";

	# we should always have a channel
	if(isset($data['channel']))
	{
		$str .= $data['channel']['name'];
	}

	# maybe a subchannel
	if(isset($data['subChannels'][0]))
	{
		$str .= ' | '. $data['subChannels'][0]['name'];	
	}

	# or a category
	if(isset($data['subChannels'][0]['categories']))
	{
		$str .= ' | '. $data['subChannels'][0]['categories'][0]['name'];	
	}

	# and finally an article
	if(isset($data['article']))
	{
		$str .= ' | '. $data['article']['title'];
	}

	# send it back
	return $str;
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
	if ( ! Session::has('nav') )
	{
		$response = App::make("ApiClient")->get("app/nav");

		if($response['success']) {
			$data = $response['success']['data'];
		}

		Session::put('nav', $data['channels']);		
	}	

	return Session::get('nav');
}

/**
 * go through a list of articles and extract out unique categories
 * 
 * @param  array $features [a list of articles]
 * @return array           [sorted categories]
 */
function getFeatureCategories($features)
{
	$response = [];

	foreach( $features AS $feature )
	{
		$id = $feature['assignment']['category']['id'];

		# make sure the categories we add are unique
		if( ! array_key_exists($id, $response))
		{
			$response[$id] = [
				'name' => $feature['assignment']['category']['name'],
				'path' => $feature['assignment']['category']['path']
			];
		}
	}

	return array_values($response);
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

	return isset($themes[$section]) ? $themes[$section] : 'themeNews';
}

function assetPath()
{
	return "/";
}

function baseUrl()
{
	//return URL::to('/').'/';
	return URL::to('/');
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
