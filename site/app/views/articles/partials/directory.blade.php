@if ( ! $isMobile)

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
                zoom: 14
            };

            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            var position = new google.maps.LatLng(mapItems.lat, mapItems.lon);

            var marker = new google.maps.Marker({
                position: position,
                map: map,
                title: mapItems.title
            });

            google.maps.event.addListener(marker, 'click', function () {
                infowindow.setContent(this.title);
                infowindow.open(map, this);
            });

            marker.setMap(map);

            map.setCenter(position);
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>
@endif

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

<article class="pageSection cmsContent">
    <!-- Header -->
    @if (! $isMobile) <!-- only show for the web version -->
        @include('articles.partials.header')
    @endif

    <div class="grid">
    <!-- Top Carousel -->
        <div class="column col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">
            @include('articles.partials.gallery.top') 

        <aside class="column col-25 mobCol-18-20 mobColFirst">
            <h5>Location</h5>
            <p>{{ $article['venue']['name'] }}<br>
            {{ $article['venue']['address1'] }}<br>
            @if( !empty( $article['venue']['address2'] ) )
                {{ $article['venue']['address2'] }}<br>
            @endif 
            @if( !empty( $article['venue']['address3'] ) )
                {{ $article['venue']['address3'] }}<br>
            @endif  
            Bristol, <a href="#">{{ $article['venue']['postcode'] }}</a>
            </p>

            @if ( !empty($article['venue']['website']) )
                <h5>Website</h5>
                <p>
                <a href="{{ $article['venue']['website'] }}">{{ $article['venue']['website'] }}</a>
                </p>
            @endif

            @if ( !empty($article['venue']['twitter']) )
                <h5>Twitter</h5>
                <p>
                <a href="#">{{ $article['venue']['twitter'] }}</a>
                </p>
            @endif

            @if ( !empty($article['venue']['email']) )
                <h5>Email</h5>
                <p>
                <a href="mailto:{{ $article['venue']['email'] }}">{{ $article['venue']['email'] }}</a>
                </p>
            @endif

            @if ( !empty($article['venue']['phone']) )
                <h5>Phone</h5>
                <p>
                {{ $article['venue']['phone'] }}
                </p>
            @endif
            <input type="button" value="Share" class="primaryButton">
        </aside>

        <!-- Main Content -->   
        <div class="fr col-75 mobCol-18-20 mobColLast">
            <div>
                <h2>{{ $article['subHeading'] }}</h2>
                <p class="author">Author, {{ $article['published'] }}</p>

                {{ $article['body'] }}
            </div>
        </div>

        <!-- Advert --> 
        @if( isset($adverts[1]) )  
            <div class="advert">
                <figure>
                    <a href="{{ $adverts[1]['url'] }}">
                        <img alt="{{ $adverts[1]['media']['alt'] }}" src="{{ $adverts[1]['media']['filepath'] }}" width="100%">
                    </a>
                    <figcaption>
                        Advertising
                    </figcaption>
                </figure>
            </div>
        @endif

        <!-- Main Content Area (continued) -->   
        <div class="fr col-75 mobCol-18-20 mobColLast cmsSecondaryContent">

            <div class="mapContainer" id="map"></div>

            {{ $article['bodyContinued'] }}
        </div>

        <!-- Lower Carousel -->   

        @include('articles.partials.gallery.bottom')

    </div>

    <!-- Related Articles --> 

    @include('articles.partials.related')

</article>