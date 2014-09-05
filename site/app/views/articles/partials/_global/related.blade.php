<aside class="column col-4-20 tabCol-20-20 leftColumnLine">
    <p class="secondaryHeader tabColSpacing1">Like this? You might be interested in...</p>

    <div class="carouselContainer">
        <div>
            <div class="articleList">

                <?php $counter = 1; ?>
                @if( count($related) > 0 )
                    @foreach( $related AS $r )

                        <?php 
                            $subChannel = getArticleSubChannel($r);
                            $category = getArticleCategory($r);
                        ?>

                        <div class="articleListItem column artCol-1-3 <?php echo $counter == 1 ? 'artColFirst' : '' ?><?php echo $counter == 3 || $counter == 6 ? 'artColLast' : '' ?>">
                            <a href="{{ $subChannel->path }}" class="articleListSubChannel">{{ $subChannel->name }}</a>
                            <div class="articleListSynopsis">
                                @if(isset($r['media']))
                                    <div class="articleListImage">
                                        <a href="{{ $r['path'] }}">                                        
                                            <img alt="{{ $r['media']['alt'] }}" src="{{ $r['media']['filepath'] }}" />                                        
                                        </a>
                                        <a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
                                    </div>
                                @endif
                                <div class="articleListContent">
                                    <a href="{{ $subChannel->path }}" class="articleListSubChannel">
                                        {{ $subChannel->name }}
                                    </a> 
                                    <a class="articleListTitle" href="{{ $r['path'] }}">
                                        {{ $r['title'] }}
                                    </a>
                                    <?php /* 
                                        PURPOSEFULLY REMOVED UNTIL LAYOUT ISSUES CAN BE RESOLVED 
                                        <p class="articleListSummary">{{ str_limit($r['subHeading'], $limit = 30, $end = '...') }}</p> */ 
                                    ?>
                                    <a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
                                </div>
                            </div>
                        </div>

                        <?php $counter++ ?>

                        @if($counter == 4 )
                            <?php $counter = 1 ?>
                        @endif
                        
                    @endforeach
                @endif
            </div>
        </div>
    </div> <!-- /.carouselContainer -->                
</aside>