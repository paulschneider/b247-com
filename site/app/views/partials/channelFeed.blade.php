<section class="pageSection grid">
    <header class="col-12-12">
        <h1 class="secondaryHeader">{{ $feed['name'] }}</h1>
    </header>

    <div class="carouselContainer">
        <div class="carouselArticleList">
            <div class="articleList">
                @if ( count($feed['articles']) > 0 )
                    <?php $counter = 1; ?>
                    @foreach ( $feed['articles'] AS $article )

                        @if ( $article['isAdvert'] )
                            <?php $ad = $article ?>
                            @include( 'partials.advert' )
                        @else
                            @include( 'partials.sm-article' )
                        @endif 

                        @if( $counter == 2 )
                            </div><div class="articleList">
                            <?php $counter = 1 ?>
                        @else
                            <?php $counter++ ?>
                        @endif
                         
                    @endforeach
                </div>
                </div> 
                <a class="carouselViewAll col-3-12" href="#">See full listings</a>
            @else
                <p>There are currently no articles to display</p>
        @endif
    </div>
</section>
<hr>