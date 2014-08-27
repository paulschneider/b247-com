@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<article class="pageSection cmsContent">
    <!-- Header -->
    @if (! $isMobile) <!-- only show for the web version -->
        @include("articles.partials._global.header")
    @endif   

    <div class="grid">
        <!-- Top Carousel -->
        <div class="column col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">
            @include('articles.partials._global.gallery-top') 
        
        <aside class="column col-25 mobCol-18-20 mobColFirst">
<<<<<<< HEAD
            <div class="dateBlock">

            <?php $date = getEventDate($article['event']['details']['epoch']) ?>

                <div class="dateEntry">
                    {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
                    <span>{{ $date->month['short'] }}</span>
                </div>

                <div class="dateDivider">-</div>

                <div class="dateEntry">
                    Sun 04<br>
                    <span>May</span>
                </div>
            </div>

            <h5>{{ $article['event']['venue']['name'] }}</h5>
            <p>
                {{ $date->time }}<br>
                &pound;{{ $article['event']['details']['price'] }}<br>
                <a href="#">Tickets</a>
            </p>
=======
                           
            @if( isset($article['event']['details']['performances']['summary']['isMovie']) )
                @include("articles.partials.listing.side-movie")
            @else
                @include("articles.partials.listing.side-performance")
            @endif
>>>>>>> cycle

            @if (! $isMobile) <!-- only show for the web version -->
                <input type="button" value="Share" class="primaryButton">
            @endif
        </aside>

        <div class="fr col-75 mobCol-18-20 mobColLast">
            <div>
                <h2>{{ $article['subHeading'] }}</h2>
                <p class="author">{{ $article['author'] }}, {{ $article['published'] }}</p>
                {{ $article['body'] }}
            </div>
        </div>

        <!-- Advert --> 
        @if (isset($adverts[1]))
            <?php $advert = $adverts[1] ?>
            @include("adverts.partials.letterbox")
        @endif

        <div class="fr col-75 mobCol-18-20 mobColLast cmsSecondaryContent">
            @if ( isset($article['video']) )
                <div class="videoContainer">
                    {{ $article['video']['embed'] }}
                </div>
            @endif
            {{ $article['bodyContinued'] }}
        </div>

        <!-- Lower Carousel -->   

        @include("articles.partials._global.gallery-bottom")

    </div>

    <!-- Related Articles --> 

    @include("articles.partials._global.related")

</article>

@include("articles.partials._global.comments")
