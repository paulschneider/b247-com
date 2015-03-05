@extends('layouts.default')

@include('layouts.header')

@section('content')

@include('channels.partials.sub-nav')

@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif
      
<section>
    <div class="sub-header-by-day">
        <ul>
            <li class="by-day-left"><a href="{{ baseUrl() }}/channel/{{ $channel['sefName'] }}">Back</a></li>
        </ul>
    </div>
</section>  
      
<section>
    <div class="highlights themeNews">
        <div class="section-header">
            <div class="section-header-box">{{ $channel['name'] }}</div>
        </div>

        <?php $j = 1; ?>

        @foreach($articles AS $article)
            @if( ! $article['isAdvert'] )
                <?php 
                    $category = getArticleCategory($article);
                    $subChannel = getArticleSubChannel($article); 
                ?>

                <div class="content-col <?php echo getTheme($article) ?> <?php echo $j == 4 ? 'last-in-row' : '' ?>">                
                    <a href="{{ $article['path'] }}">
                        <img src="{{ $article['media']['filepath'] }}"/>
                    </a>

                    <div class="content-row">
                        <h1>
                            <a href="{{ $article['path'] }}">{{ $article['title'] }}</a>
                        </h1>
                        <h2 class="hide_mobile">{{ $article['subHeading'] }}</h2>
                        <h3>{{ $subChannel->name }} - {{ $category->name }}</h3>
                    </div>
                </div>
     
                <?php 
                    if( $j == 4 )
                    {
                        $j = 0; 
                    }
                    $j++;
                ?>
            @endif
        @endforeach
    </div>
</section>

<section>
    @include('partials.pagination')
</section> 

@include('channels.partials.sub-nav')
    
@endsection

@include('layouts.footer')