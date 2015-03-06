@extends('layouts.default')

@include('layouts.header')

@section('content')

@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<section>
	<div class="sub-header-by-day">
		<ul>
			@if(isset($searchTerm))
				<li class="by-day-left">
					Your search for <span class="red">{{ $searchTerm }}</span> 
					returned <span class="red">{{ $resultCount }} results</span>
				</li>
			@endif
			<li class="by-day-right">
				<form action="/search" method="post" class="searchContainer">
					<input type="text" class="text" value="{{ isset($searchTerm) ? $searchTerm : '' }}" placeholder="Search" name="search">
					<input type="submit" class="primaryButton" value="Go">
				</form>
			</li>
		</ul>
	</div>
</section>  
      
<section>
	<div class="highlights themeNews">
		<div class="section-header">
			<div class="section-header-box">Search</div>
		</div>

		@if(isset($searchResults))
			<div class="list-row">

				<?php $j = 1 ?>

				@foreach($searchResults AS $result)

				<?php 
					# we do this horrible-ness because the original design called for results to be sectioned into their parent
					# channel. This was changed right at the end to be a single grid list of articles. There was no
					# time allocated to update the API accordingly.
					# (paulschneider)
				?>		

					@foreach($result['articles'] AS $article)
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
	            @endforeach
			</div>
		@endif
	</div> 
</section>

@include('partials.pagination')

@endsection

@include('layouts.footer')