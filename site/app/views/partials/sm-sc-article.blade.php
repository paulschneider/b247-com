<div class="articleListItem column artCol-1-3 <?php echo $counter == 0 ? ' artColFirst' : '' ?>">	
	<div class="articleListSynopsis">
		<div class="articleListImage">
			<a href="{{ $article['path'] }}">
				@if ( isset( $article['media']['filepath'] ) )
					<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}">
				@endif
			</a>
			<a href="{{ $article['assignment']['category']['path'] }}" class="articleListCategories">{{ $article['assignment']['category']['name'] }}</a>
		</div>

		<div class="articleListContent">
			<a class="articleListTitle" href="{{ $article['path'] }}">{{ $article['title'] }}</a>
			<p class="articleListSummary">{{ $article['subHeading'] }}</p>
			<a href="{{ $article['assignment']['category']['path'] }}" class="articleListCategories">{{ $article['assignment']['category']['name'] }}</a>
		</div>
	</div>
</div>