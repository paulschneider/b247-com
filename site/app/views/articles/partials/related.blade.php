<aside class="column col-4-20 tabCol-20-20 leftColumnLine">
    <p class="secondaryHeader tabColSpacing1">Like this? You might be interested in...</p>

    <div class="carouselContainer">
        <div class="carouselArticleListSide">
            <div class="articleList">

                <?php $counter = 0; ?>
                @if( count($related) > 0 )
                    @foreach( $related AS $r )

                        <?php 
                            $subChannel = getArticleSubChannel($r);
                            $category = getArticleCategory($r);
                        ?>

                        <div class="articleListItem column artCol-1-3 <?php echo $counter == 0 ? 'artColFirst' : '' ?>">
                            <a href="{{ $subChannel->path }}" class="articleListSubChannel">{{ $subChannel->name }}</a>
                            <div class="articleListSynopsis">
                                <div class="articleListImage">
                                    <a href="{{ $r['path'] }}">
                                        <img alt="" src="{{ $r['media']['filepath'] }}" />
                                    </a>
                                    <a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
                                </div>
                                <div class="articleListContent">
                                    <a href="{{ $subChannel->path }}" class="articleListSubChannel">
                                        {{ $subChannel->name }}
                                    </a> 
                                    <a class="articleListTitle" href="{{ $r['path'] }}">
                                        {{ $r['title'] }}
                                    </a>
                                    <p class="articleListSummary">{{ $r['subHeading'] }}</p>
                                    <a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div> <!-- /.carouselContainer -->                
</aside>