<div class="advert">
    <figure>
        <a href="{{ $advert['url'] }}" rel="nofollow">
	        @if(isset($advert['media']))
	            <img alt="{{ $advert['media']['alt'] }}" src="{{ $advert['media']['filepath'] }}" width="100%" />
	        @endif
        </a>
        <figcaption>
            Advertising
        </figcaption>
    </figure>
</div>