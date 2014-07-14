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
			zoom: 13
		};

		var map = new google.maps.Map(document.getElementById("map"), mapOptions);

		var calviumPos = new google.maps.LatLng(51.451508, -2.598464);

		var calvium = new google.maps.Marker({
			position: calviumPos,
			map: map,
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
		}		
	}

	google.maps.event.addDomListener(window, 'load', initialize);

</script>

<section class="featureArea grid">
	<div id="map"/>
</section>