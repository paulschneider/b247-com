<!-- ADVERT -->
@if( isset($adverts[0]) )
    <section>
        <div class="ad-lb-02">
            <a href="{{ $advert['url'] }}" rel="nofollow">
                @if(isset($advert['media']))
                    <img alt="{{ $advert['media']['alt'] }}" src="{{ $advert['media']['filepath'] }}" width="100%" />
                @endif
            </a>
        </div>
    </section>
@endif
<!-- END ADVERT -->