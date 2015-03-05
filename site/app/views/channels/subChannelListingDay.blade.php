@extends('layouts.default')

@include('layouts.header')

@section('content')      

@include('channels.partials.sub-nav')

@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<?php 
	$day = $days[0];
	$date = getEventDate($day['publication']['epoch']);
	$lastWeek = $date->timeStamp;
	$epochToday = $day['publication']['epoch'];
?>

<section>
	<div class="sub-header-by-day">
		<ul>
			<li class="by-day-left">
				<a href="{{ baseUrl().$route }}/week/{{ $lastWeek }}">Back</a>
			</li>
			@for($i = 1; $i<= $date->daysInMonth; $i++)
				<li class="<?php echo $i == $date->day ? 'active' : '' ?>">
					<a href="{{ baseUrl().$route }}/day/{{ getDailyTimestamp($date, $i) }}">{{ $i }}</a>
				</li>
			@endfor
			<li class="by-day-right">
				<a href="{{ baseUrl().$route }}/week/{{ $date->lastMonth }}">< previous month</a>  
				|   
				<a href="{{ baseUrl().$route }}/week/{{ $date->nextMonth }}">next month ></a></li>
		</ul>
	</div>
</section>  
	      
<section>
	<div class="highlights themeWhats">
		<div class="section-header">
			<div class="section-header-box">{{ $date->dayOfWeek['short'] .' '. $date->day .' '. $date->month['full'] }}</div>
		</div>

	<?php $j = 1; ?>
	
	@foreach($day['articles'] AS $article)
		<?php 
			$category = getArticleCategory($article);
			$subChannel = getArticleSubChannel($article); 
		?>
		<div class="content-col themeWhats <?php echo $j == 4 ? 'last-in-row' : '' ?>">
			<a href="{{ $article['path'] }}">
				<img src="{{ $article['media']['filepath'] }}"/>
			</a>
			<div class="content-row">			
				<h1>
					<a href="{{ $article['path'] }}">{{ $article['title'] }}</a>
				</h1>			
				<h2 class="hide_mobile">{{ $article['subHeading'] }}</h2>
				<h3>{{ $subChannel->name }} - {{ $category->name }}</h3>
			</div>
		</div>

		<?php 
            if( $j == 4 )
            {
                $j = 0; 
            }
            $j++;
        ?>

	@endforeach
</section>     

@if (isset($adverts[2]))
    <?php $advert = $adverts[2] ?>
    @include("adverts.partials.letterbox")
@endif

@include('channels.partials.sub-nav')

@endsection

@include('layouts.footer')