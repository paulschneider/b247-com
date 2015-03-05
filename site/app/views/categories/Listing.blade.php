@extends('layouts.default')

@include('layouts.header')

@section('content')      

@include('channels.partials.sub-nav')

<!-- Letterbox advert - top -->
@if( isset($adverts[0]) )
	<?php $advert = $adverts[0] ?>
	@include("adverts.partials.letterbox")
@endif

<?php 
	$day = $days[0];
	$date = getEventDate($day['publication']['epoch']);
	$epochToday = $day['publication']['epoch'];
	$lastWeek = $date->timeStamp;
?>

<section>
	<div class="sub-header-by-day">
		<ul>
			<li class="by-day-left">
				<a href="{{ $previousPage }}">Back</a>
			</li>
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
					@if( isset($article['media']['filepath']) )
						<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
					@endif
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

	</div>
</section>    

<!-- Letterbox advert - top -->
@if( isset($adverts[2]) )
	<?php $advert = $adverts[2] ?>
	@include("adverts.partials.letterbox")
@endif

@include('channels.partials.sub-nav')

@endsection

@include('layouts.footer')