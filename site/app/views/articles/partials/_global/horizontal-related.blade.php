@if( isset($related) and count($related) > 0) 

    <section class="pageSection grid">
        <header class="artCol-3-3 artColFirst artColLast">
            <h1 class="secondaryHeader">Like this? You might be interested in...</h1>
        </header>
        
        <div class="carouselContainer">
            <div class="carouselArticleList">
                <div class="articleList">
                    <?php $counter = 1; ?>
                        @foreach( $related AS $r )

                            <?php 
                                $subChannel = getArticleSubChannel($r);
                                $category = getArticleCategory($r);
                            ?>

                            <div class="articleListItem column artCol-1-3 <?php echo $counter == 1 ? 'artColFirst' : '' ?>">
                                <a href="{{ $subChannel->path }}" class="articleListSubChannel">{{ $subChannel->name }}</a>
                                <div class="articleListSynopsis">
                                    <div class="articleListImage">
                                        <a href="{{ $r['path'] }}">
                                            @if( isset($r['media']) )
                                                <img alt="" src="{{ $r['media']['filepath'] }}" />
                                            @endif
                                        </a>
                                        <a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
                                    </div>
                                    <div class="articleListContent">
                                        <a href="{{ $subChannel->path }}" class="articleListSubChannel">
                                             {{ $subChannel->name }}
                                        </a> 
                                        <a class="articleListTitle" href="{{ $r['path'] }}">{{ $r['title'] }}</a>
                                        <p class="articleListSummary">{{ $r['subHeading'] }}</p>
                                        <a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
                                    </div>
                                </div>
                            </div>

                            @if( $counter == 3 )
                                </div><div class="articleList">
                                <?php $counter = 1 ?>
                            @else
                                <?php $counter++ ?>
                            @endif

                        @endforeach
                </div> <!-- .articleList -->
            </div>
        </div> <!-- /.carouselContainer -->
    </section>

@endif