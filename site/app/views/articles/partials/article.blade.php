@if (isset($adverts[0]))
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
        <div class="column col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">
            @include('articles.partials.gallery.top')        

        <!-- Header -->
        <div class="fr col-75 mobCol-18-20 mobColLast">
            <div>
                <h2>{{ $article['subHeading'] }}</h2>
                <p class="author">Author, {{ $article['published'] }}</p>
                {{ $article['body'] }}
            </div>
        </div>
         
        <!-- Main Content Area -->       
        <div class="fr col-75 mobCol-18-20 mobColLast cmsSecondaryContent">
            @if ( isset($article['video']) )
                <div class="videoContainer">
                    {{ $article['video']['embed'] }}
                </div>
            @endif

            {{ $article['bodyContinued'] }}
        </div>
        
        <!-- Lower Carousel -->   

        @include('articles.partials.gallery.bottom')
                   
    </div>

    <!-- Related Articles --> 

    @include('articles.partials.related')

</article>
