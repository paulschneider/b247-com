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

<article class="pageSection cmsContent">
    <!-- Header -->
    @if (! $isMobile) <!-- only show for the web version -->
        @include('articles.partials.header')
    @endif   

    <div class="grid">
        <!-- Top Carousel -->
        <div class="column col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">
            <div class="fr col-75 mobCol-20-20 carouselContainer">
                <div class="galleryLarge">
                    <div class="carouselSingleGallery">
                        <div class="gallerySlides">
                            <div>
                                <img alt="" src="/a/i/gallery/large.jpg">
                            </div>
                        </div>                    
                        <div class="gallerySlides">
                            <div>
                                <img alt="" src="/a/i/gallery/large.jpg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        <aside class="column col-25 mobCol-18-20 mobColFirst">
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
                <a href="#">Tickets</ha>
            </p>

            <input type="button" value="Share" class="primaryButton">
        </aside>

        <div class="fr col-75 mobCol-18-20 mobColLast">
            <div>
                <h2>{{ $article['subHeading'] }}</h2>
                <p class="author">Author, {{ $article['published'] }}</p>
                {{ $article['body'] }}
            </div>
        </div>

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

        <div class="fr col-75 mobCol-18-20 mobColLast cmsSecondaryContent">
            @if ( isset($article['video']) )
                <div class="videoContainer">
                    {{ $article['video']['embed'] }}
                </div>
            @endif
            {{ $article['bodyContinued'] }}
        </div>

        <!-- Lower Carousel -->   

        @include('articles.partials.gallery')

    </div>

    <!-- Related Articles --> 

    @include('articles.partials.related')

</article>
