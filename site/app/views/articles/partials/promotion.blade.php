@if (isset($adverts[0]))
    <div class="advert">
        <figure>
            <a href="{{ $adverts[0]['url'] }}">
                <img alt="{{ $adverts[0]['media']['alt'] }}" src="{{ $adverts[0]['media']['filepath'] }}" width="100%">
            </a>
            <figcaption>
                Advertising
            </figcaption>
        </figure>
    </div>
@endif

<article class="pageSection cmsContent">
    
    <!-- Header -->
    @if (! $isMobile) <!-- only show for the web version -->
        @include('articles.partials.header')
    @endif
    
    <div class="grid">
        <div class="column col-12-20 colFirst tabCol-18-20 tabColFirst mobCol-20-20">
            <aside class="column col-25 mobCol-18-20 mobColFirst">
                @if (! $isMobile) <!-- only show for the web version -->
                    <input type="button" value="Share" class="primaryButton">
                @endif
            </aside>

        <div class="fr col-75 mobCol-18-20 mobColLast">
            <h2>{{ $article['subHeading'] }}</h2>
            <p class="author">{{ $article['author'] }}, {{ $article['published'] }}</p>

            {{ $article['body'] }}

            <div class="emailVoucher">
                <img width="315px" height="85px" alt="Email me a voucher" src="/i/layout/email-voucher.png">
                <a href="#">Email me a voucher</a>
            </div>            

            @if( isset($adverts[1]) )
                <div class="advert">
                    <figure>
                        <a href="{{ $adverts[1]['url'] }}">
                            <img alt="{{ $adverts[1]['media']['alt'] }}" src="{{ $adverts[1]['media']['filepath'] }}" width="100%">
                        </a>
                        <figcaption>
                            Advertising
                        </figcaption>
                    </figure>
                </div>
            @endif
    </div>    
</article>

<hr class="spacerUp">

@include('articles.partials.horizontal-related')
