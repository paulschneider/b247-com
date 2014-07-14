@extends('layouts.default')

@include('layouts.header')

@section('content')

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

<section class="pageSection grid">
    <header class="artCol-3-3 artColFirst">
        <h1 class="primaryHeader">{{ getChannelName($channel) }}</h1>
    </header>

    <ul class="linkList">
        <?php $counter = 0 ?>
        <li class="artCol-1-3 <?php echo $counter == 0 ? 'artColFirst' : '' ?>">    
            <ul>
                @foreach( $categories AS $category )
                    <li><a href="{{ $category['path'] }}">{{ $category['name'] }} <span>({{ $category['numberOfArticles'] }})</span></a></li>
                    <?php $counter++ ?>

                    @if( $counter == 5 )
                            </ul>
                        </li>
                        <li class="artCol-1-3">   
                            <ul>
                        <?php $counter = 1; ?>
                    @endif
                @endforeach
            </ul>
        </li>
    </ul>
</section>

<hr class="spacer">

<section class="pageSection grid">

    <header class="artCol-3-3 artColFirst artColLast">
        <h1 class="secondaryHeader">Featured</h1>
    </header>

    <div class="carouselContainer">
        <div class="carouselArticleList">
            <div class="articleList">

                <?php $counter = 0; ?>

                @foreach ( $articles AS $article )
                    
                    @if ( $article['isAdvert'] )
                        <?php $ad = $article; ?>
                        @include( 'partials.advert' )
                    @else
                        @include( 'partials.sm-sc-article' )                        
                    @endif                  

                    <?php $counter = $counter + $article['displayStyle'] ?>

                    @if( $counter == 3 )
                        </div><div class="articleList">
                        <?php $counter = 0 ?>
                    @endif

                  @endforeach
            </div>     
        </div>
    </div>
</section>

<hr>

<div class="advert spacer">
    <figure>
        <a href="{{ $adverts[1]['url'] }}">
            <img alt="{{ $adverts[1]['media']['alt'] }}" src="{{ $adverts[1]['media']['filepath'] }}" width="100%">
        </a>
        <figcaption>
            Advertising
        </figcaption>
    </figure>
</div>

@endsection
@include('layouts.footer')
