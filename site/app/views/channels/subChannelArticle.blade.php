@extends('layouts.default')

@include('layouts.header')

@section('content')

@include('channels.partials.sub-nav')

@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<section class="pageSection">
    <div class="grid">
        <header class="artCol-3-3 artColFirst">
            <h1 class="primaryHeader"><span class="subPrimaryHeader">{{ getSubChannelName($channel) }}:</span> All articles</h1>
            <p class="backTo">Back to: <a href="{{ getChannelPath($channel) }}">{{ getChannelName($channel) }}</a></p>
        </header>
    </div>

    <hr>

    <div class="grid">
        <div class="articleList">
            <div class="artColRow">
                <?php $i = 0; $s = 1; ?>
                @foreach($articles AS $article)
                    <?php $i += displayStyle($article) ?>
                    <div class="articleListItem column <?php echo $s == 1 ? 'artColFirst' : '' ?> <?php echo $i == 3 || $i == $pagination['perPage'] ? 'artColLast' : '' ?> <?php echo displayStyle($article) == 2 ? 'artCol-2-3' : 'artCol-1-3' ?> ">
                        @if($article['isAdvert'])
                            <div class="articleListBlockAdvert advert">
                                <figure>
                                    <a href="{{ $article['url'] }}" rel="nofollow">
                                        <img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
                                    </a>
                                    <figcaption>
                                        Advertising
                                    </figcaption>
                                </figure>
                            </div>
                        @else
                            <?php 
                                $category = getArticleCategory($article);
                            ?>

                            @if( displayStyle($article) == 2)
                                <div class="articleListStandOut">
                                    <div class="articleListImage">
                                        <div class="articleListStandOutContent">
                                            <a href="{{ baseUrl().$article['path'] }}" class="articleListTitle">{{ $article['title'] }}</a>
                                            <p class="articleListSummary">{{ $article['subHeading'] }}</p>
                                        </div>
                                        <div class="articleListStandOutImage">
                                            <a href="{{ baseUrl().$article['path'] }}">
                                                @if( isset($article['media']) and !empty($article['media']) )
                                                    <img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
                                                @endif
                                            </a>
                                            <a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="articleListSynopsis">
                                    <div class="articleListImage">
                                        <a href="{{ baseUrl().$article['path'] }}">
                                            @if( isset($article['media']) and !empty($article['media']) )
                                                <img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
                                            @endif
                                        </a>
                                        <a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
                                    </div>
                                    <div class="articleListContent">
                                        <a class="articleListTitle" href="{{ baseUrl().$article['path'] }}">{{ $article['title'] }}</a>
                                        <p class="articleListSummary">{{ $article['subHeading'] }}</p>
                                        <a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
                                    </div>
                                </div>
                            @endif
                        @endif
                        
                    </div>
                    <?php $s++ ?>
                    @if($i == 3)
                        </div><div class="artColRow">
                        <?php $s = 1; $i = 0; ?>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</section>

@include('partials.pagination')

@include('channels.partials.sub-nav')
    
@endsection

@include('layouts.footer')