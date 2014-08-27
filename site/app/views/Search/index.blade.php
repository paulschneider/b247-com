@extends('layouts.default')

@include('layouts.header')

@section('content')

@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<section class="pageSection">
	<div class="grid">
		<header class="artCol-3-3 artColFirst sectionHeader searchHeader">
			<h1 class="primaryHeader">Search</h1>
			@if(isset($searchTerm))
				<p class="backTo">Your search for <strong>{{ $searchTerm }}</strong> returned <a href="#">{{ $resultCount }} result(s)</a></p>
			@endif

			<form action="/search" method="post" class="searchContainer">
				<input type="text" class="text" value="{{ isset($searchTerm) ? $searchTerm : '' }}" placeholder="Search" name="search" />
				<input type="submit" class="primaryButton" value="Go" />
				<a class="searchClose icoSearchHide" href="#">Hide</a>
			</form>
		</header>
	</div>

	<hr>

	<div class="grid">
		<div class="articleList">
			<div class="artColRow">

				@if(isset($searchResults))
					<?php $i = 0; $s = 1; ?>
					@foreach($searchResults AS $result) 
						@foreach($result['articles'] AS $article)

							<?php 
								$category = getArticleCategory($article); 
								$subChannel = getArticleSubChannel($article); 
							?>

							<div class="articleListItem <?php echo getTheme($article) ?> column <?php echo $i == 0 ? 'artColFirst' : '' ?> <?php echo $i == 3 || $i == $pagination['perPage'] ? 'artColLast' : '' ?> artCol-1-3 ">
								<a href="{{ $subChannel->path }}" class="articleListSubChannel">{{  $subChannel->name }}</a>
								<div class="articleListSynopsis">
									<div class="articleListImage">								
										<a href="{{ $article['path'] }}">
				  							 @if( isset($article['media']) and !empty($article['media']) )
	                                            <img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
	                                        @endif
										</a>
										<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
									</div>
									<div class="articleListContent">
										<a href="{{ $article['path'] }}" class="articleListSubChannel">{{  $subChannel->name }}</a> 
										<a class="articleListTitle" href="{{ $article['path'] }}">{{ $article['title'] }}</a>
										<p class="articleListSummary">{{ $article['subHeading'] }}</p>
										<a href="{{ $category->path }}" class="articleListCategories">{{ $category->name }}</a>
									</div>
								</div>
							</div>

							<?php $s++; $i++; ?>

		                    @if($i == 3)
		                        </div><div class="artColRow">
		                        <?php $i = 0; ?>
		                    @endif
	                    @endforeach
					@endforeach

				@endif
			</div>
		</div>
	</div>
</section>  

@include('partials.pagination')

@endsection

@include('layouts.footer')