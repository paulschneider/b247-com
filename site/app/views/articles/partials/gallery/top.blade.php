@if( isset($article['gallery']['top']) )
    <!-- Top Carousel -->    
    <div class="fr col-75 mobCol-20-20 carouselContainer">
        <div class="galleryLarge">
            <div class="carouselSingleGallery">
                @foreach( $article['gallery']['top'] AS $image )
                    <div class="gallerySlides">                                      
                        <div>
                            <img alt="" src="{{ $image['filepath'] }}" />
                        </div>
                    </div>
                @endforeach
            </div>
        </div>    
    </div>    
 @endif