@extends('layouts.default')

@include('layouts.header')

@section('content')
        
<section class="featureArea grid">
	<div class="carouselFeatureContainer">
		<div class="carouselFeatureList">              
			<div class="featureList col-16-20 tabCol-20-20 colFirst colLast">

              <?php $counter = 1 ?>
              @foreach( $features AS $feature )

              	@if( $counter == 1 )
					<div class="featureListItemStandOut">
						<a href="{{ $feature['assignment']['channel']['path'] }}" class="featureListLink">
							<span class="featureListChannel">
								{{ $feature['assignment']['channel']['name'] }}
							</span>
							<div class="featureListStandOutContent">
								<div class="featureListStandOutContentPosition">
									<span class="featureListSubChannel">
										{{ $feature['assignment']['subChannel']['name'] }}
									</span>
									<h1 class="featureListTitle">{{ $feature['title'] }}</h1>
									<p class="featureListSummary">{{ $feature['subHeading'] }}</p>
								</div>
							</div>
							<img alt="{{ $feature['media']['alt'] }}" title="{{ $feature['media']['title'] }}" src="{{ $feature['media']['filepath'] }}" />
						</a>
						<div class="featureListCategories">
							<a href="{{ $feature['assignment']['category']['path'] }}" class="featureListCategoriesButton">{{ $feature['assignment']['category']['name'] }}</a>
							<a href="#" class="categoriesMoreListMore">...</a>
							<ul class="categoriesMoreList">
								@foreach( getFeatureCategories($features) AS $category )
									<li>
										<a href="{{ $category['path'] }}">{{ $category['name'] }}</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
              	@else
					<div class="featureListItem">
						<a href="#" class="featureListLink">
							<div class="featureListContent">
								<h1 class="featureListTitle">{{ $feature['title'] }}</h1>
							</div>
							<img alt="{{ $feature['media']['alt'] }}" title="{{ $feature['media']['title'] }}" src="{{ $feature['media']['filepath'] }}" />
						</a>
					</div>
              	@endif
              	
              	@if( $counter == 3 )
              		</div><div class="featureList col-16-20 tabCol-20-20 colFirst colLast">
              		<?php $counter = 1 ?>
              	@else
              		<?php $counter++ ?>
              	@endif

              @endforeach	 
			</div>
		</div>
	</div>
</section>
          
<hr>

@if( isset($adverts[0]) )
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

<!-- PICKS -->
     
<section class="pageSection grid">

	<header class="artCol-3-3 artColFirst artColLast">
		<h1 class="secondaryHeader">Picks</h1>
	</header>

	<div class="carouselDoubleContainer">
		<div class="carouselDoubleList">
			<div class="articleList">
				<div class="artColRow">

				<?php $i = 0; $s = 1; ?>

				@foreach($picks AS $article)
					<?php $i += displayStyle($article) ?>

					<div class="articleListItem <?php echo getTheme($article) ?> column <?php echo $s == 1 ? 'artColFirst' : '' ?> <?php echo $i == 3 || $i == 6 ? 'artColLast' : '' ?> <?php echo displayStyle($article) == 2 ? 'artCol-2-3' : 'artCol-1-3' ?> mobArtCol-3-3">
						@if($article['isAdvert'])
							<div class="articleListBlockAdvert advert">
								<figure>
									<a href="{{ $article['url'] }}">
										<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
									</a>
									<figcaption>
										Advertising
									</figcaption>
								</figure>
							</div>
						@else
							<?php 
								$category = getArticleCategory($article);
								$subChannel = getArticleSubChannel($article); 
							?>

							@if(displayStyle($article) == 2)
								<div class="articleListStandOut">
									<div class="articleListImage">
										<div class="articleListStandOutContent">
											<a href="{{ baseUrl().$subChannel->path }}" class="articleListSubChannel">{{ $subChannel->name }}</a>
											<a href="{{ baseUrl().$article['path'] }}" class="articleListTitle">{{ $article['title'] }}</a>
											<p class="articleListSummary">{{ $article['subHeading'] }}</p>
											<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
										</div>
										<div class="articleListStandOutImage">
											@if( isset($article['media']) and !empty($article['media']) )
												<a href="{{ baseUrl().$article['path'] }}">
													<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
												</a>
												<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
											@endif
										</div>
									</div>
								</div>
							@else
								<a href="{{ baseUrl().$subChannel->path }}" class="articleListSubChannel">{{ $subChannel->name }}</a>
								<div class="articleListSynopsis">
									<div class="articleListImage">
										@if( isset($article['media']) and !empty($article['media']) )
										<a href="{{ baseUrl().$article['path'] }}">
											<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
										</a>
										<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
										@endif
									</div>
									<div class="articleListContent">
										<a href="{{ baseUrl().$subChannel->path }}" class="articleListSubChannel">{{ $subChannel->name }}</a> 
										<a class="articleListTitle" href="{{ baseUrl().$article['path'] }}">{{ $article['title'] }}</a>
										<p class="articleListSummary">{{ $article['subHeading'] }}</p>
										<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
									</div>
								</div>
							@endif
						@endif				
					</div>
					<?php $s++ ?>
					@if($i == 3 or $i == 6)
						</div><div class="artColRow">
						<?php $s = 1; ?>
					@endif
					@if($i == 6)
						<?php $i = 0; $s = 1; ?>
						</div></div><div class="articleList"><div class="artColRow">
					@endif
					
				@endforeach	      
				</div>
			</div>
		</div>
</section>

<hr class="spacer">

<!-- CHANNEL FEED -->
@if( isset($channelFeed) )
	<?php $totalFeeds = count($channelFeed); $counter = 1; ?>
	@foreach($channelFeed AS $feed)
		<section class="pageSection grid">

			<header class="artCol-3-3 artColFirst artColLast">
				<h1 class="secondaryHeader">{{ $feed['name'] }}</h1>
			</header>

			<div class="carouselContainer">
				<div class="carouselArticleList">
					<div class="articleList">

						<?php $i = 0; $s = 1; ?>				

						@foreach($feed['articles'] AS $article)
							<?php $i += displayStyle($article) ?>
							<div class="articleListItem <?php echo getTheme($article) ?> column  <?php echo $s == 1 ? 'artColFirst' : '' ?> <?php echo $i == 3 ? 'artColLast' : '' ?> <?php echo displayStyle($article) == 2 ? 'artCol-2-3' : 'artCol-1-3' ?>">
								@if( $article['isAdvert'] )
									<div class="articleListBlockAdvert advert">
										<figure>
											<a href="{{ $article['url'] }}">
												<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
											</a>
											<figcaption>
												Advertising
											</figcaption>
										</figure>
									</div>
								@else
									<?php 
										$category = getArticleCategory($article);
										$subChannel = getArticleSubChannel($article); 
									?>

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
											<p class="articleListDetails">Venue Name, from &pound;12.50</p>
											<p class="articleListSummary">{{ $article['subHeading'] }}</p>
											<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
										</div>
									</div>
								@endif														
							</div> 

							<?php $s++ ?>
							@if($i == 3)
								</div><div class="articleList">
								<?php $i = 0; $s = 1; ?>
							@endif

						@endforeach
					</div>
				</div>
				<a class="carouselViewAll col-3-12" href="{{ $feed['path'] }}">See full listings</a>
			</div>
		</section>

		<?php $counter++; ?>
		
		@if($counter <= $totalFeeds)
			<hr class="spacer">
		@endif

	@endforeach
@endif
          
@endsection
@include('layouts.footer')