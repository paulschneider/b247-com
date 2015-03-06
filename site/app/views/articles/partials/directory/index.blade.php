
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key={{ $apiKey }}"></script>

    <script type="text/javascript">

        function initialize() {

            var mapItems = <?php echo json_encode($mapItems) ?>

            var infowindow = new google.maps.InfoWindow({
                content: mapItems.title
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

            infowindow.open(map, marker);

            marker.setMap(map);

            map.setCenter(position);
        }

        google.maps.event.addDomListener(window, 'load', initialize);

    </script>


@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<section>
    <div class="article <?php echo getTheme($article) ?>">
        <div id="define-col-1">
            <img src="{{ $article['gallery']['top']['0']['filepath'] }}" width="100%" alt="{{ $article['gallery']['top']['0']['alt'] }}" />

            <div class="spacer"></div>

            <div class="art-col-1">
                @if (! $isMobile) <!-- only show for the web version -->
                    @include('articles.partials._global.share')
                @endif
            </div>

            <div class="art-col-2">
                <div class="art-upper" style="padding-bottom:26px;">
                    <h1>
                        <span class="alt-color">{{ $article['assignment']['category']['name'] }}:</span> 
                        {{ $article['title'] }}
                    </h1>
                </div> 

                <div class="art-upper"> 
                    <h2>
                        {{ $article['author'] }}, {{ getPublishedDate($article['published']) }}
                        <div class="art-nav">
                            @if ( ! $isMobile ) 
                            <a href="{{ isset($navigation['previous']['article']['path']) ? $navigation['previous']['article']['path'] : '/no-where' }}">< previous article</a>
                            |   
                            <a href="{{ isset($navigation['next']['article']['path']) ? $navigation['next']['article']['path'] : '/no-where' }}">next article ></a>
                            @endif
                        </div>
                    </h2>
                </div>
                  
                <span class="body">
                    {{ $article['body'] }}
                    {{ $article['bodyContinued'] }}
                </span>

                @include('articles.partials._global.category-list')
            </div>
        </div>

        <div id="define-col-2">

            <attributes>
                <h9>{{ $article['venue']['name'] }}</h9>
                <h9>{{ $article['venue']['address1'] }}</h9>
                <h9>{{ $article['venue']['address2'] }}</h9>
                <h9>{{ $article['venue']['address3'] }}, {{ $article['venue']['postcode'] }}</h9>

                <div class="spacer-row"></div>

                @if( isset($article['venue']['website']) and !empty($article['venue']['website']) )
                    <h8>Website:<span class="h8-attrib">{{ $article['venue']['website'] }}</span></h8>    
                @endif

                @if( isset($article['venue']['twitter']) and !empty($article['venue']['twitter']) )
                    <h8>Twitter:<span class="h8-attrib">{{ $article['venue']['twitter'] }}</span></h8>    
                @endif

                @if( isset($article['venue']['phone']) and !empty($article['venue']['phone']) )
                    <h8>Phone:<span class="h8-attrib">{{ $article['venue']['phone'] }}</span></h8>    
                @endif            
            
                <div class="spacer-row"></div>    
            </attributes>

            @include('articles.partials._global.related')
        </div>
    </div>

    @include("articles.partials._global.comments")

</section>