@extends('layouts.default')

@include('layouts.header')

@section('content')

@include('channels.partials.sub-nav')

<!-- Letterbox advert - top -->
@if( isset($adverts[0]) )
	<?php $advert = $adverts[0] ?>
	@include("adverts.partials.letterbox")
@endif
   
<section>
    <div class="highlights {{ getChannelTheme($activeChannel) }}">
        <div class="section-header">
            <div class="section-header-box">{{ getCategoryName($channel) }}</div>
        </div>

        <?php $j = 1; ?>
        
        <div class="list-row">
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
                                <h3>
                                    <a href="{{ $subChannel->path }}">{{ $subChannel->name }}</a>
                                     - 
                                    <a href="{{ $category->path }}">{{ $category->name }}</a>
                                </h3>
                            </div>
                        </div>     
                         
                        @if( $j == 4 )
                            <?php $j = 0; ?>
                            </div><div class="list-row">
                        @endif
                        
                        <?php $j++; ?>

                @endif
            @endforeach
        </div>
    </div>
</section>

@include('partials.pagination')

@include('channels.partials.sub-nav-lower')

@endsection

@include('layouts.footer')