@extends('layouts.default')

@include('layouts.header')

@section('content')

@include('channels.partials.sub-nav')

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

		for(var i = 0; i < mapItems.length; i++)
		{
			var position = new google.maps.LatLng(mapItems[i].lat, mapItems[i].lon);

			var marker = new google.maps.Marker({
				position: position,
				map: map,
				title: mapItems[i].title,
				url: mapItems[i].path
			});

			google.maps.event.addListener(marker, 'mouseover', function () {
				infowindow.setContent(this.title);
				infowindow.open(map, this);
			});

			google.maps.event.addListener(marker, 'mouseout', function () {
				infowindow.close(map, this);
			});

			google.maps.event.addListener(marker, 'click', function() {
			    window.location.href = this.url;
			});

			marker.setMap(map);

			map.setCenter(centre);
		}		
	}

	google.maps.event.addDomListener(window, 'load', initialize);

</script>

<!-- Letterbox advert - top -->
@if( isset($adverts[0]) )
	<?php $advert = $adverts[0] ?>
	@include("adverts.partials.letterbox")
@endif

<section>
	<div class="sub-header-by-day">
		<ul>
			<li class="by-day-left"><a href="{{ getSubChannelPath($channel) }}">Back</a></li>
			<li class="by-day-right">Your search returned {{ $totalArticles }} results</li>
		</ul>
	</div>
</section>  
      
<section>
	<div class="highlights themeFood">
		<div class="section-header">
			<div class="section-header-box">{{ getCategoryName($channel) }}</div>
		</div>

		<div id="map" class="map-container"></div>

		<?php $j = 1; ?>

		@foreach( $articles AS $article )
			<?php 
                $category = getArticleCategory($article);
                $subChannel = getArticleSubChannel($article); 
            ?> 

			<div class="content-col <?php echo themeClass($activeChannel) ?> <?php echo $j == 4 ? 'last-in-row' : '' ?>">
                <a href="{{ $article['path'] }}">
                    <img src="{{ $article['media']['filepath'] }}"/>
                </a>
                <div class="content-row">
                    <h1><a href="{{ $article['path'] }}">{{ $article['title'] }}</a></h1>
                    <h2 class="hide_mobile">{{ $article['subHeading'] }}</h2>
                    <h3>{{ $subChannel->name }} - {{ $category->name }}</h3>
                </div>
            </div>

            <?php           
                if( $j == 4 ) {
                    $j = 0; 
                }                           

                $j++;                   
            ?>

		@endforeach
	</div> 
</section>      

<!-- Letterbox advert - top -->
@if( isset($adverts[1]) )
	<?php $advert = $adverts[1] ?>
	@include("adverts.partials.letterbox")
@endif

@include('channels.partials.sub-nav-lower')

@endsection

@include('layouts.footer')