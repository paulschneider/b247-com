@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<article class="pageSection cmsContent">
    
    <!-- Header -->
    @include("articles.partials._global.header")
    
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

            <!-- there has to be a promotion attached to the article -->
            @if( isset($article['promotion'][0]['code']) )
                @include("articles.partials.promotion.voucher")
            <!-- of a competition  -->
            @elseif( isset($article['competition'][0]['id']) )
                 @include("articles.partials.promotion.competition")
            <!-- or we tell the user the voucher is unavailable at this time -->
            @else
                <p><strong>This promotion is not currently available.</strong></p>
            @endif

            @if (isset($adverts[1]))
                <?php $advert = $adverts[1] ?>
                @include("adverts.partials.letterbox")
            @endif

            {{ $article['bodyContinued'] }}
    </div>   
</article>

<hr class="spacerUp">

@include("articles.partials._global.horizontal-related")

@include("articles.partials._global.comments")