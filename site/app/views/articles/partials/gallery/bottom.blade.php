@if( isset($article['gallery']['bottom']) )
    <section class="clear colFirst colLast carouselContainer">
        <div class="gallerySmallMulti">
            @foreach($article['gallery']['bottom'] AS $image)
                <div class="gallerySlides">
                    <img alt="" src="{{ $image['filepath'] }}">
                </div>
            @endforeach
        </div>
    </section> 
@endif