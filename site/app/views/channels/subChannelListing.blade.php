 @extends('layouts.default')

@include('layouts.header')

@section('content')

@include('channels.partials.sub-nav')
  
@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<section class="pageSection">
	<div class="grid">
		<header class="artCol-3-3 artColFirst">

		<?php 
			$start = getListingInWeek($days, 0);
			$end = getListingInWeek($days, 6);
		?>

			<h1 class="primaryHeader">
				<span class="subPrimaryHeader">Listings:</span> 
				{{ $start->day .' '. $start->month['full'] .' '. $start->year }} - {{ $end->day .' '. $end->month['full'] .' '. $end->year }}
			</h1>
		</header>
		
		<p class="backTo column col-5-20 colFirst tabCol-7-20 tabColFirst mobCol-7-20 mobColFirst">
			<span class="dateMobileOff">Back to: <a href="{{ getSubChannelPath($channel) }}">{{ getSubChannelName($channel) }}</a></span>
			<span class="dateMobileOn"><a href="#">< previous 7 days</a></span>
		</p>
		<p class="backTo column col-6-20 tabCol-4-20 totalResults mobCol-4-20 selectDate">
			<input type="text" name="date" value="{{ getStartDay($days) }}" data-date-format="mm/dd/yyyy" data-date="{{ getStartDay($days) }}" data-path="{{ getSubChannelPath($channel) }}week/" style="width:1px; border: none" class="datepicker" />	
			<a href="#" class="highlight dp">
				<span class="dateMobileOff">Select date</span>
				<span class="icoCalendar"></span>
			</a>
		</p>
		<p class="backTo column col-5-20 tabCol-7-20  mobCol-7-20 moveSeven">
			<?php $less = getNewTimestamp($start, '-', '7 days'); ?>
			<span class="dateMobileOff">
				<a href="{{ baseUrl().$route }}/week/{{ $less }}">< previous 7 days</a>
			&nbsp; | &nbsp;
			</span>
			<?php $more = getNewTimestamp($start, '+', '7 days'); ?>
			<a href="{{ baseUrl().$route }}/week/{{ $more }}">next 7 days ></a></p>
	</div>

	<hr>
	<?php $counter = 0; ?>
	@foreach($days AS $day)
 
		<?php 
			$date = getEventDate($day['publication']['epoch']);
			$articles = $day['articles'];
			$categories = $day['categories'];
		 ?>

		<section class="pageSection grid">
			<div class="dateCategoryHeader">
				<div class="column artCol-1-3 artColFirst dateCategoryDate">
					<a href="{{ baseUrl().$route }}/day/{{ $date->timeStamp }}">{{ $date->dayOfWeek['short'] .' '. $date->day  }}</a>
					<a href="{{ baseUrl().$route }}/day/{{ $date->timeStamp }}"><span class="icoArrowRight"></span></a>
				</div>
				<div class="column artCol-2-3 artColLast dateCategoryCategories">
					<ul class="linkList">					
						@for($i=0; $i < count($categories); $i++)
							<?php $category = $categories[$i]; ?>
							<li><a href="{{ baseUrl().$category['path'] }}">{{ $category['name'] }} <span>({{ $category['numberOfArticles'] }})</span></a></li>
						@endfor
					</ul>
				</div>
			</div>

			<header class="artCol-3-3 artColFirst artColLast">
				<h1 class="secondaryHeader">Highlights</h1>
			</header>
			
			<div class="carouselContainer">
				<div class="{{ count($articles) > 0 && count($articles) > 3 ? 'carouselArticleList' : '' }}">
					<div class="articleList">
						<?php $s = 0; /* row item counter */ $j = 0 /* total items counter */ ?>
						@for($i=1; $i <= count($articles); $i++)
							<?php 
								$article = $articles[$j];
								$subChannel = getArticleSubChannel($article);
								$category = getArticleCategory($article);
							?>
							<div class="articleListItem column artCol-1-3 <?php echo $s == 0 ? 'artColFirst' : '' ?>">
								<a href="{{ $subChannel->path }}?time={{ $date->timeStamp }}" class="articleListSubChannel">{{ $subChannel->name }}</a>
								<div class="articleListSynopsis">
		  							<div class="articleListImage">
		    							<a href="{{ $article['path'] }}?time={{ $date->timeStamp }}">
		    								@if( isset($article['media']['filepath']) )
		      									<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
		      								@endif
		    							</a>
		    							<a href="{{ $category->path }}?time={{ $date->timeStamp }}" class="articleListCategories">{{ $category->name }}</a>
		  							</div>
		  							<div class="articleListContent">
		    							<a href="{{ $subChannel->path }}" class="articleListSubChannel">{{ $subChannel->name }}</a> 
		    							@if(isset($article['event']['details']['id']))
											<p class="articleListDetails">
												@if(isset($article['event']['venue']['name']))
													{{ $article['event']['venue']['name'] }}{{ isset($article['event']['details']['price']) ? ', from &pound;'. $article['event']['details']['price'] : '' }}
												@endif 
											</p>
										@endif
		    							<a class="articleListTitle" href="{{ $article['path'] }}?time={{ $date->timeStamp }}">{{ $article['title'] }}</a>
		    							<p class="articleListSummary">{{ $article['subHeading'] }}</p>
		    							<a href="{{ $category->path }}?time={{ $date->timeStamp }}" class="articleListCategories">{{ $category->name }}</a>
		  							</div>
								</div>
							</div>
							<?php $s++; $j++ ?>
							@if($s == 3 && $j < count($articles))
								</div><div class="articleList">
								<?php $s = 0 ?>
							@endif 					
						@endfor

					<a class="carouselViewAll artCol-1-3" href="{{ baseUrl().$route }}/day/{{ $date->timeStamp }}">See all listings <span>for {{ $date->dayOfWeek['short'] .' '. $date->day  }}</span></a>
					</div>	
				</div>	
			</div> <!-- /.carouselContainer -->
		</section>
		<?php $counter++ ?>

		@if($counter <= 6)
			<hr>
		@endif

	@endforeach
</section>

@include('channels.partials.sub-nav')

@endsection

@include('layouts.footer')