@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif
          
<article class="pageSection cmsContent">
    <!-- Header -->
    @include('articles.partials._global.header')
   
    <div class="grid">
        <div class="column col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">
            @include('articles.partials._global.gallery-top')        

        <!-- Header -->
        <div class="fr col-75 mobCol-18-20 mobColLast">
            <div>
                <p class="author">{{ $article['author'] }}, {{ getPublishedDate($article['published']) }}</p>
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

            @if($isMobile)
                <div class="comment-btn">
                    <a href="{{ $commentRoute }}" class="primaryButton">Article Comments</a>
                </div>
            @endif
        </div>
        
        <!-- Lower Carousel -->   

        @include('articles.partials._global.gallery-bottom')        
                   
    </div>

    <!-- Related Articles --> 

    @include('articles.partials._global.related')

</article>

@include("articles.partials._global.comments")