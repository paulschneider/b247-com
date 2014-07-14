<div class="articleListItem themeWhats column artCol-2-3 <?php echo $counter == 0 ? 'artColFirst' : '' ?>">
	<div class="articleListStandOut">
		<div class="articleListImage">
			<div class="articleListStandOutContent">
				<a href="{{ $pick['assignment']['subChannel']['path'] }}" class="articleListSubChannel">{{ $pick['assignment']['subChannel']['name'] }}</a>
				<a href="#" class="articleListTitle">{{ $pick['title'] }}</a>
				<p class="articleListSummary">{{ $pick['subHeading'] }}</p>
				<a href="{{ $pick['assignment']['category']['path'] }}" class="articleListCategories">{{ $pick['assignment']['category']['name'] }}</a>
			</div>
			<div class="articleListStandOutImage">
				<a href="{{ $pick['path'] }}">
				<img alt="{{ $pick['media']['alt'] }}" src="{{ $pick['media']['filepath'] }}" />
				</a>
				<a href="#" class="articleListCategories">Category</a>
			</div>
		</div>
	</div>
</div>