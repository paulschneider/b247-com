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
              		</div><div class="featureList col-12-12">
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
          
<section class="pageSection grid">

	<header class="artCol-3-3 artColFirst artColLast">
		<h1 class="secondaryHeader">Picks</h1>
	</header>

	<div class="carouselDoubleContainer">
  		<div class="carouselDoubleList">
   			<div class="articleList">
   				<div class="artColRow">

	   			<?php $counter = 0; ?>

	   			@foreach ( $picks AS $pick )
	  				@if ( $pick['isAdvert'] )
	  					<?php $ad = $pick ?>
	    				@include( 'partials.advert' )
	    			@else
	    				<?php $article = $pick ?>
	    				@if ( $pick['displayStyle'] == 1 )        				
	    					@include( 'partials.sm-article' )
	    				@elseif ( $pick['displayStyle'] == 2 )
	    					@include( 'partials.lg-pick' )
	    				@endif
	    			@endif	    			

	    			<?php $counter = $counter + $pick['displayStyle'] ?> 

		      		@if( $counter == 3 )
		          		</div><div class="artColRow">
		          		<?php $counter = 0 ?>
		          	@endif
		          @endforeach
		        </div>
		    </div>
      	</div>
    </div>

</section>
          
<hr>

@foreach ( $channelFeed AS $feed ) 
	@include('partials.channelFeed')
@endforeach
          
@endsection
@include('layouts.footer')