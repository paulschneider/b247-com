@extends('layouts.default')

@include('layouts.header')

@section('content')

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}"></script>

<script type="text/javascript">

	function initialize() {

		var mapItems = <?php echo $mapItems ?>

		var infowindow = new google.maps.InfoWindow({
	    	content: "holding"
	  	});

		var centre = new google.maps.LatLng(51.4714686, -2.6001674);

		var mapOptions = {
			center: centre,
			zoom: 12
		};

		var map = new google.maps.Map(document.getElementById("map"), mapOptions);

		var calviumPos = new google.maps.LatLng(51.451508, -2.598464);

		var calvium = new google.maps.Marker({
			position: calviumPos,
			//map: map,
			title: "Calvium"
		});			

	  	google.maps.event.addListener(calvium, 'click', function () {
			infowindow.setContent(this.title);
			infowindow.open(map, this);
		});

		for(var i = 0; i < mapItems.length; i++)
		{
			var position = new google.maps.LatLng(mapItems[i].lat, mapItems[i].lon);

			var marker = new google.maps.Marker({
				position: position,
				map: map,
				title: mapItems[i].title
			});

			google.maps.event.addListener(marker, 'click', function () {
				infowindow.setContent(this.title);
				infowindow.open(map, this);
			});

			marker.setMap(map);

			map.setCenter(calviumPos);
		}		
	}

	google.maps.event.addDomListener(window, 'load', initialize);

</script>

<!-- Letterbox advert - top -->
@if( isset($adverts[0]) )
	<?php $advert = $adverts[0] ?>
	@include("adverts.partials.letterbox")
@endif

<section class="pageSection">
	<div class="grid">
		<header class="artCol-3-3 artColFirst">
			<h1 class="primaryHeader"><span class="subPrimaryHeader">{{ getSubChannelName($channel) }}:</span> {{ getCategoryName($channel) }}</h1>
		</header>

		<p class="backTo column col-5-20 colFirst tabCol-9-20 tabColFirst mobCol-18-20 mobColFirst">Back to: <a href="{{ getSubChannelPath($channel) }}">{{ getSubChannelName($channel) }}</a></p>
		<p class="backTo column col-6-20 tabCol-9-20 totalResults mobCol-18-20 mobColFirst">Your search returned <span class="highlight">{{ $totalArticles }} results</span></p>
	</div>

	<hr>

	<div class="grid">
		<div class="col-16-20 colFirst tabCol-20-20">
			<div class="mapContainer">
				<div class="mapBox" id="map"></div>
				<a class="viewMap" href="#">
					<img alt="View map" src="a/i/layout/view-map.png">
				</a>
				<a class="hideMap" href="#">Back</a>
			</div>
		</div>
	</div>

	<div class="grid">
		<div class="carouselDoubleContainer">
			<div class="carouselDoubleList">
				<div class="articleList">
					<div class="artColRow">

					<?php $counter = 0; ?>
						@foreach( $articles AS $article )

							<div class="articleListItem themeCulture column <?php echo $counter == 0 || $counter == 3 ? 'artColFirst' : ''?> artCol-1-3">
								<div class="articleListSynopsis">
									<div class="articleListImage">
										<a href="{{ $article['path'] }}">
											@if(isset($article['media']['filepath']))
												<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}">
											@endif
										</a>
										<a href="{{ $article['assignment']['category']['path'] }}" class="articleListCategories">{{ $article['assignment']['category']['name'] }}</a>
									</div>

									<div class="articleListContent">
										<a class="articleListTitle" href="{{ $article['path'] }}">{{ $article['title'] }}</a>
										<p class="articleListSummary">{{ $article['subHeading'] }}</p>
										<a href="{{ $article['assignment']['category']['path'] }}" class="articleListCategories">{{ $article['assignment']['category']['name'] }}</a>
									</div>
								</div>
							</div>
							<?php $counter = $counter + $article['displayStyle'] ?>

							@if ( $counter == 3 )
								</div><div class="artColRow">
							@endif
							@if ( $counter == 6 )
								</div></div><div class="articleList"><div class="artColRow">
								<?php $counter = 0; ?>
							@endif
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<hr>        

<!-- Letterbox advert - top -->
@if( isset($adverts[1]) )
	<?php $advert = $adverts[1] ?>
	@include("adverts.partials.letterbox")
@endif

@endsection

@include('layouts.footer')