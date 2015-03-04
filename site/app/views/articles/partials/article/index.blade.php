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
        </div>
    </div>

    <div id="define-col-2">
        @include('articles.partials._global.related')
    </div>

</section>

@include("articles.partials._global.comments")