@extends('layouts.default')

@include('layouts.header')

@section('content')

@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<section class="pageSection grid">
    <header class="artCol-3-3 artColFirst">
        <h1 class="primaryHeader">{{ getSubChannelName($channel) }}</h1>
    </header>

    <ul class="linkList">
        <?php $counter = 0 ?>
        <li class="artCol-1-3 <?php echo $counter == 0 ? 'artColFirst' : '' ?>">    
            <ul>
                <?php $perColumn = ceil(count($categories)/3) ?>

                @foreach( $categories AS $category )
                    <li><a href="{{ $category['path'] }}">{{ $category['name'] }} <span>({{ $category['numberOfArticles'] }})</span></a></li>
                    <?php $counter++ ?>

                    @if( $counter == $perColumn )
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

                <?php $counter = 0; $s = 0; ?>

                @foreach ( $articles AS $article )
                    
                    @if ( $article['isAdvert'] )
                        <?php $ad = $article; ?>
                        @include( 'partials.advert' )
                    @else
                        @include( 'partials.sm-sc-article' )                        
                    @endif                  

                    <?php $counter++; $s++ ?>

                    @if( $counter == 3 and $s < count($articles))
                        </div><div class="articleList">
                        <?php $counter = 0 ?>
                    @endif

                  @endforeach
            </div>     
        </div>
    </div>
</section>

<hr>

@if (isset($adverts[1]))
    <?php $advert = $adverts[1] ?>
    @include("adverts.partials.letterbox")
@endif

@endsection

@include('layouts.footer')
