@extends('layouts.default')

@include('layouts.header')

@section('content')
        
<section >
	<div class="features">		
	 		<div class="main-featured-col <?php echo getTheme($features[0]) ?>">
				<div class="main-featured-img-mob">
					<a href="{{ $features[0]['path'] }}">
						<img src="{{ $features[0]['media']['filepath'] }}" />
					</a>
				</div>

				<a href="{{ $features[0]['path'] }}">
					<div class="main-featured-img-other" style="background-image:url('{{ $features[0]['media']['filepath'] }}');"></div>
				</a>

				<div class="main-featured-row">
					<h1>
						<a href="{{ $features[0]['path'] }}">
							{{ $features[0]['title'] }}
						</a>
					</h1>
					<h2>{{ $features[0]['subHeading'] }}</h2>
					<h3>{{ $features[0]['assignment']['channel']['name'] }} - {{ $features[0]['assignment']['subChannel']['name'] }}</h3>
				</div>
			</div>
		</a>

		<div class="featured-wrap">

			<?php $counter = 1; $j = 1; ?>

			@for( $i = 1; $i != 5; $i++ )

				@if( $counter != 5 )
						<div class="featured-col <?php echo getTheme($features[$i]) ?> <?php echo $j == 4 ? 'last-in-row' : '' ?>">
							<a href="{{ $features[$i]['path'] }}">
								<img src="{{ $features[$i]['media']['filepath'] }}" alt="{{ $features[$i]['media']['alt'] }}" title="{{ $features[$i]['media']['title'] }}" />
							</a>

							<div class="featured-row">
								<h1>
									<a href="{{ $features[$i]['path'] }}">
										{{ $features[$i]['title'] }}
									</a>
								</h1>
								<h2>{{ $features[$i]['subHeading'] }}</h2>
								<h3>{{ $features[$i]['assignment']['channel']['name'] }} - {{ $features[$i]['assignment']['subChannel']['name'] }}</h3>
							</div>
						</div>
					</a>
				@endif

				@if( $counter < 5 )
					<?php $counter++ ?>
				@endif

				<?php $j++ ?>

			@endfor
			
		</div>
   </div>
</section>

<!-- ADVERT -->
@if( isset($adverts[0]) )
	<section>
		<div class="ad-lb-02">
			<a href="{{ $adverts[0]['url'] }}">
				<img src="{{ $adverts[0]['media']['filepath'] }}" />
			</a>
		</div>
	</section>
@endif
<!-- END ADVERT -->

<section>
	<div class="highlights">
		<div class="section-header">
			<div class="section-header-box">Highlights</div>
		</div>

		<?php $j = 1 ?>

		@foreach($picks AS $article)
			@if( ! $article['isAdvert'])
				<div class="content-col <?php echo getTheme($article) ?> <?php echo $j == 4 ? 'last-in-row' : '' ?>">
					<img src="{{ $article['media']['filepath'] }}" />
					<div class="content-row">
						<h1>{{ $article['title'] }}</h1>
						<h2 class="hide_mobile">{{ $article['subHeading'] }}</h2>
						<h3>{{ $article['assignment']['channel']['name'] }} - {{ $article['assignment']['subChannel']['name'] }}</h3>
					</div>
				</div>

				<?php $j++ ?>

				<?php if($j == 5) $j = 1 ?>

			@endif 

		@endforeach

	</div>
</section>

<!-- CHANNEL FEED -->
@if( isset($channelFeed) )

	<?php 
		$totalFeeds = count($channelFeed); 
		$counter = 1; 

		# see if we have the whats-on articles in the feed. If so we'll handle them differently to everything else
		if( hasEventArticles($channelFeed) )
		{
			$eventFeed = $channelFeed[0];
			unset($channelFeed[0]);
			$hasEvents = true;
		}
	?>

	<!-- WHATS ON -->

	@if( isset($hasEvents) )
		<section>
			<div class="whatson themeWhats">		
				<div class="section-header">
					<div class="section-header-box">{{ $eventFeed['name'] }}</div>
				</div>

				<?php $j = 1; ?>

				@foreach( $eventFeed['articles'] AS $article )

					@if( ! $article['isAdvert'] )
						<?php 
							$category = getArticleCategory($article);
							$subChannel = getArticleSubChannel($article); 
						?> 

						<div class="whatson-col <?php echo $j == 5 ? 'last-in-row' : '' ?>">
							<div class="semi-circle hide_mobile">{{ $subChannel->name }}</div>	
								
							<a href="{{ $article['path'] }}">
								<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
							</a>
				
							<div class="whatson-row">
								<h1><a href="{{ $article['path'] }}">{{ $article['title'] }}</a></h1>
								<h2 class="hide_mobile">{{ $article['subHeading'] }}</h2>
								<h3>{{ $subChannel->name }} - {{ $category->name }}</h3>
							</div>
						</div>
					@endif

					<?php 						
						if( $j == 5 )
							$j = 0;

						$j++;
					?>

				@endforeach
			</div>
		</section>
@endif
	
	<!-- CHANNEL FEED -->
	@foreach($channelFeed AS $feed)

		<?php $totalArticles = count($feed['articles']) ?>

		@if($totalArticles > 0)

			<section>
				<div class="carousels  <?php echo getChannelTheme($feed) ?>">
					<div class="section-header">
						<div class="section-header-box">{{ $feed['name'] }}</div>
					</div>

					<?php $j = 1; $s = 1; ?>

					<div class="define-slider-row">
						<div class="owl-carousel owl-theme">	
							<div class="slider-page">
								@foreach($feed['articles'] AS $article)
							
									@if( ! $article['isAdvert'] )
										<?php 
											$category = getArticleCategory($article);
											$subChannel = getArticleSubChannel($article); 
										?> 
										
											<div class="slider-col <?php echo $j == 4 ? 'last-in-row' : '' ?>">	
												
												<a href="{{ $article['path'] }}">				
													<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
												</a>
												
												<div class="slider-row">
													<h1>
														<a href="{{ $article['path'] }}">
															{{ $article['title'] }}
														</a>
													</h1>
													<h2 class="hide_mobile">{{ $article['subHeading'] }}</h2>
													<h3>{{ $subChannel->name }} - {{ $category->name }}</h3>
												</div>
											</div>
										
										<?php $j++; ?>
										
										@if($j == 5) 										
											<?php $j = 1; ?>
											</div>
											<div class="slider-page">
										@endif

									@endif

								@endforeach
							</div>
						</div>	
					</div>
				</div>
			</section>
		@endif
	@endforeach
@endif
          
@endsection
@include('layouts.footer')