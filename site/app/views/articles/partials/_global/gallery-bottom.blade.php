@if( isset($article['gallery']['bottom']) )
    <section class="pageSection grid">
    	<div class="col-10-20 colSpacing3 tabCol-14-20 carouselContainer">
	        <div class="gallerySmallMulti">
	            @foreach($article['gallery']['bottom'] AS $image)
	                <div class="gallerySlides">
	                    <img alt="" src="{{ $image['filepath'] }}" />
	                </div>
	            @endforeach
	        </div>
        </div>
    </section> 
@endif