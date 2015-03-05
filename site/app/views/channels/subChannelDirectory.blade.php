@extends('layouts.default')

@include('layouts.header')

@section('content')

@include('channels.partials.sub-nav')

@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<section>
    <div class="highlights <?php echo themeClass($activeChannel) ?>">

        <div class="section-header">
            <div class="section-header-box">{{ $channel['name'] }}</div>
        </div>

        <div class="sub-chan-dir">
            <ul>
                @foreach( $categories AS $category )
                    <li><a href="{{ $category['path'] }}">{{ $category['name'] }} ({{ $category['numberOfArticles'] }})</a></li>
                @endforeach
            </ul>
        </div>

        <?php $j = 1; ?>
        
        @foreach ( $articles AS $article )
            <?php 
                $category = getArticleCategory($article);
                $subChannel = getArticleSubChannel($article); 
            ?> 

            <div class="content-col <?php echo themeClass($activeChannel) ?> <?php echo $j == 5 ? 'last-in-row' : '' ?>">
                <a href="{{ $article['path'] }}">
                    <img src="{{ $article['media']['filepath'] }}"/>
                </a>
                <div class="content-row">
                    <h1><a href="{{ $article['path'] }}">{{ $article['title'] }}</a></h1>
                    <h2 class="hide_mobile">{{ $article['subHeading'] }}</h2>
                    <h3>{{ $subChannel->name }} - {{ $category->name }}</h3>
                </div>
            </div>

            <?php           
                if( $j == 5 ) {
                    $j = 0; 
                }                           

                $j++;                   
            ?>  
        @endforeach 
    </div>
</section>

@if (isset($adverts[1]))
    <?php $advert = $adverts[1] ?>
    @include("adverts.partials.letterbox")
@endif

@include('channels.partials.sub-nav')

@endsection

@include('layouts.footer')
