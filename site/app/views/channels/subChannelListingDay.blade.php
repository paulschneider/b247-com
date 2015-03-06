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

		<div class="section-highlights">
			<div class="section-highlights-title">Highlights</div>	 
			@if( isset($day['picks']) and count($day['picks']) > 0 )
				@foreach($day['picks'] AS $pick)

					<?php 
						$category = getArticleCategory($pick);
						$subChannel = getArticleSubChannel($pick); 
					?>

					<div class="featured-col themeWhats">

						<a href="{{ $pick['path'] }}">
							<img src="{{ $pick['media']['filepath'] }}" />
						</a>

						<div class="featured-row">
							<h1><a href="{{ $pick['path'] }}">{{ $pick['title'] }}</a></h1>
							<h2>{{ $pick['subHeading'] }}</h2>
							<h3>
								<a href="{{ $subChannel->path }}">{{ $subChannel->name }}</a>
								 - 
								<a href="{{ $category->path }}">{{ $category->name }}</a>
							</h3>
						</div>
					</div>
				@endforeach
			@endif
		</div>

	<?php $j = 1; ?>

	<div class="list-row">
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
					<h3>
	                    <a href="{{ $subChannel->path }}">{{ $subChannel->name }}</a>
	                     - 
	                    <a href="{{ $category->path }}">{{ $category->name }}</a>
	                </h3>
				</div>
			</div>

			@if( $j == 4 )
                <?php $j = 0; ?>
                </div><div class="list-row">
            @endif
            
            <?php $j++; ?>    

		@endforeach
	</div>
</section>     

@if (isset($adverts[2]))
    <?php $advert = $adverts[2] ?>
    @include("adverts.partials.letterbox")
@endif

@include('channels.partials.sub-nav-lower')

@endsection

@include('layouts.footer')