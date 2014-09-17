
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}"></script>

    <script type="text/javascript">

        function initialize() {

            var mapItems = <?php echo json_encode($mapItems) ?>

            var infowindow = new google.maps.InfoWindow({
                content: "holding"
            });

            var centre = new google.maps.LatLng(51.4714686, -2.6001674);

            var mapOptions = {
                center: centre,
                zoom: 16
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


@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<article class="pageSection cmsContent">
    <!-- Header -->
    @include("articles.partials._global.header")

    <div class="grid">
    <!-- Top Carousel -->
        <div class="column col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">
            @include('articles.partials._global.gallery-top')   

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
            
            @if (! $isMobile) <!-- only show for the web version -->
                <input type="button" value="Share" class="primaryButton">
            @endif
        </aside>

        <!-- Main Content -->   
        <div class="fr col-75 mobCol-18-20 mobColLast">
            <div>
                <p class="author">{{ $article['author'] }}, {{ getPublishedDate($article['published']) }}</p>

                {{ $article['body'] }}
            </div>
        </div>

        <!-- Advert --> 
       @if (isset($adverts[1]))
            <?php $advert = $adverts[1] ?>
            @include("adverts.partials.letterbox")
        @endif

        <!-- Main Content Area (continued) -->   
        <div class="fr col-75 mobCol-18-20 mobColLast cmsSecondaryContent">

            @if( $isMobile && !empty($mapItems['lon']) && !empty($mapItems['lat']))
                <img src="http://maps.googleapis.com/maps/api/staticmap?center={{ $mapItems['lat'] }},{{ $mapItems['lon'] }}&zoom=15&size=225x90&scale=2&markers=|color:red|label:{{ $mapItems['title'] }}|{{ $mapItems['lat'] }},{{ $mapItems['lon'] }}">
            @else
                <div class="mapContainer" id="map"></div>
            @endif

            {{ $article['bodyContinued'] }}

            @if(isset($article['categoryAssignment']))
                <ul class="categoryList">
                    @foreach($article['categoryAssignment'] AS $assignment)
                        <li><a href="{{ baseUrl().$assignment['path'] }}">{{ $assignment['name'] }}</a></li>
                    @endforeach
                </ul>
            @endif

            @if($isMobile)
                <div class="comment-btn">
                    <a href="{{ $commentRoute }}" class="primaryButton">Article Comments</a>
                </div>
            @endif
        </div>

        <!-- Lower Carousel -->   

        @include("articles.partials._global.gallery-bottom")

    </div>

    <!-- Related Articles --> 

    @include("articles.partials._global.related")

</article>

@include("articles.partials._global.comments")