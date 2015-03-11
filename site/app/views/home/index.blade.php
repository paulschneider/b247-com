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
					<h3>
						<a href="{{ $features[0]['assignment']['channel']['path'] }}">{{ $features[0]['assignment']['channel']['name'] }}</a>
						 - 
						<a href="{{ $features[0]['assignment']['subChannel']['path'] }}">{{ $features[0]['assignment']['subChannel']['name'] }}</a>
					</h3>
				</div>
			</div>
		</a>

		<div class="featured-wrap">

			<?php $counter = 1; $j = 1; ?>

			@for( $i = 1; $i != 5; $i++ )

				@if( $counter != 5 )

						<?php $feature = $features[$i]; ?>

						<div class="featured-col <?php echo getTheme($feature) ?> <?php echo $j == 4 ? 'last-in-row' : '' ?>">
							<a href="{{ $feature['path'] }}">
								<img src="{{ $feature['media']['filepath'] }}" alt="{{ $feature['media']['alt'] }}" title="{{ $feature['media']['title'] }}" />
							</a>

							<div class="featured-row">
								<h1>
									<a href="{{ $feature['path'] }}">
										{{ $feature['title'] }}
									</a>
								</h1>
								<h2>{{ $feature['subHeading'] }}</h2>
								<h3>
									<a href="{{ $feature['assignment']['channel']['path'] }}">{{ $feature['assignment']['channel']['name'] }}
								 - 
									<a href="{{ $feature['assignment']['channel']['path'] }}">{{ $feature['assignment']['subChannel']['name'] }}
								</h3>
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

<!-- HIGHLIGHTS / PICKS -->

<section>
	<div class="highlights">
		<div class="section-header">
			<div class="section-header-box">Highlights</div>
		</div>

		<?php $j = 1; $articleCount = 1; ?>

		@foreach($picks AS $article)
			@if( ! $article['isAdvert'] and $articleCount <= 8)
				<div class="content-col <?php echo getTheme($article) ?> <?php echo $j == 4 ? 'last-in-row' : '' ?>">
					
					<a href="{{ $article['path'] }}">
						<img src="{{ $article['media']['filepath'] }}" />
					</a>

					<div class="content-row">
						<h1>
							<a href="{{ $article['path'] }}">{{ $article['title'] }}</a>
						</h1>
						<h2 class="hide_mobile">{{ $article['subHeading'] }}</h2>
						<h3>
							<a href="{{ $article['assignment']['channel']['path'] }}">{{ $article['assignment']['channel']['name'] }}</a>
							 - 
							<a href="{{ $article['assignment']['subChannel']['path'] }}">{{ $article['assignment']['subChannel']['name'] }}</a>
						</h3>
					</div>
				</div>

				<?php $j++; $articleCount++ ?>

				<?php if($j == 5) $j = 1 ?>
			@elseif ( $article['isAdvert'] )
				<div class="ad-mpu-r">
					<div class="mpu">
						<a href="{{ $article['url'] }}" target="_blank">
							<img src="{{ $article['media']['filepath'] }}" width="100%" />
						</a>
					</div>
				</div>
				<?php $j = 1 ?> <!-- RESET THE ITEM COUNTER -->
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
								
							<a href="{{ $article['path'] }}?time={{ $article['event']['details']['epoch'] }}">
								<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
							</a>
				
							<div class="whatson-row">
								<h1><a href="{{ $article['path'] }}?time={{ $article['event']['details']['epoch'] }}">{{ $article['title'] }}</a></h1>
								<h2 class="hide_mobile">{{ $article['subHeading'] }}</h2>
								<h3>
									<a href="{{ $subChannel->path }}?time={{ $article['event']['details']['epoch'] }}">{{ $subChannel->name }}</a>
									 -  
									<a href="{{ $category->path }}?time={{ $article['event']['details']['epoch'] }}">{{ $category->name }}</a></h3>
								<h4>{{ $article['event']['venue']['name'] }}</h4>
								
								<h5>Created : {{ $article['created'] }}</h5>
								<h6>Event Date : {{ $article['event']['details']['showDate'] }}</h6>
								
							</div>
						</div>

						<?php 			
							if( $j == 5 ) {
								$j = 0;	
							}							

							$j++;					
						?>					
					@endif
				@endforeach
			</div>
		</section>
@endif
	
	<!-- CHANNEL FEED -->
	@foreach($channelFeed AS $feed)

		<?php $totalArticles = count($feed['articles']) ?>

		@if($totalArticles > 0)

			<section>
				<div class="carousels <?php echo getChannelTheme($feed) ?>">
					<div class="section-header">
						<div class="section-header-box">{{ $feed['name'] }}</div>
					</div>

					<?php $j = 1; $articles = 1; ?>

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
													<h3>
														<a href="{{ $subChannel->path }}">{{ $subChannel->name }}</a>
														 - 
														<a href="{{ $category->path }}">{{ $category->name }}</a>
													</h3>
												</div>
											</div>
										
										<?php $j++; $articles++; ?>
										
										@if($j == 5) 										
											<?php $j = 1; ?>											
											@if($articles < $totalArticles)
												<!-- START A NEW CAROUSEL PAGE -->
												</div>
												<div class="slider-page">
											@else 
												</div>
											@endif
										@endif
									@else
										<div class="ad-mpu-l">
											<div class="mpu">
												<a href="{{ $article['url'] }}" target="_blank">
													<img src="{{ $article['media']['filepath'] }}" width="100%" />
												</a>
											</div>
										</div>
										<?php $j = $j+2; ?>
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