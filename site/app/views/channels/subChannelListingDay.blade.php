@extends('layouts.default')

@include('layouts.header')

@section('content')      

@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<?php 
	$day = $days[0];
	$date = getEventDate($day['publication']['epoch']);
	$lastWeek = $date->timeStamp;
?>

<section class="pageSection">
	<div class="grid">
		<header class="artCol-3-3 artColFirst">
			<h1 class="primaryHeader"><span class="subPrimaryHeader">Listings:</span> {{ $date->dayOfWeek['short'] .' '. $date->day .' '. $date->month['full'] }}</h1>
			<p class="backTo">
				Back to: <a href="{{ baseUrl().$route }}/week/{{ $lastWeek }}">Listings</a>
				<span class="fr">
					<a href="{{ baseUrl().$route }}/week/{{ $date->lastMonth }}">< previous month</a>
					&nbsp; | &nbsp;
					<a href="{{ baseUrl().$route }}/week/{{ $date->nextMonth }}">next month ></a>
				</span>
			</p>
		</header>
	</div>

	<hr>

	<div class="dayList">
		<div class="grid">
			<div class="col-16-20 colFirst tabCol-18-20 tabColFirst mobColFirst">
				<ul>
					@for($i = 1; $i<= $date->daysInMonth; $i++)
						<li class="<?php echo $i == $date->day ? 'active' : '' ?>">
							<a href="{{ baseUrl().$route }}/day/{{ getDailyTimestamp($date, $i) }}">{{ $i }}</a>
						</li>
					@endfor
				</ul>
			</div>
		</div>
	</div>
</section>

<section class="pageSection grid">
	<header class="artCol-3-3 artColFirst artColLast">
		<h1 class="secondaryHeader">Highlights</h1>
	</header>
	<!-- TOP CAROUSEL -->
	<div class="carouselContainer">
		<div class="carouselArticleList">
			<div class="articleList">

				<?php $i = 0; $s = 0; ?>	
				@if( isset($day['picks']) )
					@foreach($day['picks'] AS $article)
						<?php $category = getArticleCategory($article) ?>
						<div class="articleListItem column <?php echo $s == 0 ? 'artColFirst' : '' ?> artCol-1-3">
							<div class="articleListSynopsis">
								<div class="articleListImage">
									<a href="{{ $article['path'] }}">
										@if( isset($article['media']['filepath']) )
											<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
										@endif
									</a>
									<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>	
								</div>
								<div class="articleListContent">
									<a class="articleListTitle" href="{{ $article['path'] }}">{{ $article['title'] }}</a>
									<p class="articleListDetails">{{ $article['event']['venue']['name'] }}, from &pound;{{ $article['event']['details']['price'] }}</p>
									<p class="articleListSummary">{{ $article['subHeading'] }}</p>
									<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
								</div>
							</div>
						</div>
						<?php $s++; $i++ ?>
						@if($s == 3 && $i < count($day['picks']))
							</div><div class="articleList">
							<?php $s = 0 ?>
						@endif
					@endforeach
				@endif
			</div>
		</div>
	</div>
</section>

<hr>        

@if (isset($adverts[1]))
    <?php $advert = $adverts[1] ?>
    @include("adverts.partials.letterbox")
@endif

<section class="grid pageSection">

	<div class="articleList">
		<div class="artColRow">
		<?php $i = 0; $s = 0; ?>	

		@foreach($day['articles'] AS $article)
			<?php $category = getArticleCategory($article) ?>
			<div class="articleListItem column <?php echo $s == 0 ? 'artColFirst' : '' ?> artCol-1-3">
				<div class="articleListSynopsis">
					<div class="articleListImage">
						<a href="{{ $article['path'] }}">
							@if( isset($article['media']['filepath']) )
								<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
							@endif
						</a>
						<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>	
					</div>
					<div class="articleListContent">
						<a class="articleListTitle" href="{{ $article['path'] }}">{{ $article['title'] }}</a>
						<p class="articleListDetails">{{ $article['event']['venue']['name'] }}, from &pound;{{ $article['event']['details']['price'] }}</p>
						<p class="articleListSummary">{{ $article['subHeading'] }}</p>
						<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
					</div>
				</div>
			</div>
			<?php $s++ ?>
			@if($s == 3)
				</div><div class="artColRow">
				<?php $s = 0 ?>
			@endif
		@endforeach
	</div>
</section>

<hr>        

@if (isset($adverts[2]))
    <?php $advert = $adverts[2] ?>
    @include("adverts.partials.letterbox")
@endif

@endsection

@include('layouts.footer')