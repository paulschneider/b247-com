 @extends('layouts.default')

@include('layouts.header')

@section('content')
  
@if (isset($adverts[0]))
<div class="advert">
    <figure>
        <a href="{{ $adverts[0]['url'] }}">
            <img alt="{{ $adverts[0]['media']['alt'] }}" src="{{ $adverts[0]['media']['filepath'] }}" width="100%">
        </a>
        <figcaption>
            Advertising
        </figcaption>
    </figure>
</div>
@endif

<section class="pageSection">
	<div class="grid">
		<header class="artCol-3-3 artColFirst">

		<?php 
			$start = getListingInWeek($days, 0);
			$end = getListingInWeek($days, 6);
		?>

			<h1 class="primaryHeader"><span class="subPrimaryHeader">Listings:</span> {{ $start->day .' '. $start->month['full'] .' '. $start->year }} - {{ $end->day .' '. $end->month['full'] .' '. $end->year }}</h1>
		</header>
		
		<p class="backTo column col-5-20 colFirst tabCol-9-20 tabColFirst mobCol-18-20 mobColFirst">Back to: <a href="{{ getSubChannelPath($channel) }}">{{ getSubChannelName($channel) }}</a></p>
		<p class="backTo column col-6-20 tabCol-9-20 totalResults mobCol-18-20 mobColFirst">
			<a href="#" class="highlight">Select date</a>
		</p>
		<p class="backTo column col-5-20 showResults">
			<?php $less = getNewTimestamp($start, '-', '7 days'); ?>
			<a href="{{ baseUrl().$route }}/week/{{ $less }}">< previous 7 days</a>
			&nbsp; | &nbsp;
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
					{{ $date->dayOfWeek['short'] .' '. $date->day  }} <span class="icoArrowRight"></span>
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
				<div class="carouselArticleList">
					<div class="articleList">
						@for($i=0; $i < count($articles); $i++)
							<?php 
								$article = $articles[$i];
								$subChannel = getArticleSubChannel($article);
								$category = getArticleCategory($article);
							?>
							<div class="articleListItem column artCol-1-3 <?php echo $i == 0 ? 'artColFirst' : '' ?>">
								<a href="{{ $subChannel->path }}" class="articleListSubChannel">{{ $subChannel->name }}</a>
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
		    							<a href="{{ $subChannel->path }}" class="articleListSubChannel">{{ $subChannel->name }}</a> 
		    							<a class="articleListTitle" href="{{ $article['path'] }}">{{ $article['title'] }}</a>
		    							<p class="articleListSummary">{{ $article['subHeading'] }}</p>
		    							<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
		  							</div>
								</div>
							</div>
						@endfor

					<a class="carouselViewAll artCol-1-3" href="#">See all listings <span>for {{ $date->dayOfWeek['short'] .' '. $date->day  }}</span></a>
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