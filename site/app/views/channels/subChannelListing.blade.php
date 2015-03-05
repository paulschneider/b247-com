 @extends('layouts.default')

@include('layouts.header')

@section('content')

@include('channels.partials.sub-nav')
  
@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif


@foreach($days AS $day)
	<section>
		<?php 
			$date = getEventDate($day['publication']['epoch']);
			$articles = $day['articles'];
			$categories = $day['categories'];
		 ?>

		<div class="carousels themeWhats">
			<div class="section-header">
				<div class="section-header-box">
					<a href="{{ baseUrl().$route }}/day/{{ $date->timeStamp }}">{{ $date->dayOfWeek['short'] .' '. $date->day  }}</a>
				</div>
			</div>

			<?php $j = 1; $s = 1; ?>

			<!-- CAROUSEL -->
			<div class="define-slider-row">
				<div class="owl-carousel">
					<div class="slider-page">

						<!-- ITEMS --> 
						@if(isset($articles) and count($articles) > 0)
							@foreach($articles AS $article)

								<?php 
									$category = getArticleCategory($article);
									$subChannel = getArticleSubChannel($article); 
								?> 

								<div class="slider-col <?php echo $j == 4 ? 'last-in-row' : '' ?>">

									<a href="{{ $article['path'] }}?time={{ $date->timeStamp }}">
										<img alt="{{ $article['media']['alt'] }}" src="{{ $article['media']['filepath'] }}" />
									</a>

									<div class="slider-row">
										<h1>
											<a href="{{ $article['path'] }}?time={{ $date->timeStamp }}">
												{{ $article['title'] }}
											</a>
										</h1>
										<h2 class="hide_mobile">{{ $article['subHeading'] }}</h2>
										<h3>{{ $subChannel->name }} - {{ $category->name }}</h3>
									</div>
								</div>

								<?php $j++; ?>

								@if($j == 5) 										
									<?php $j = 1; ?>
									</div>
									<div class="slider-page">
								@endif

							@endforeach
						@endif
					</div>
				</div>
			</div>

			<!-- CATEGORY COUNTERS -->
			<div class="sub-chan-wo">
				<ul>
					@for($i=0; $i < count($categories); $i++)
						<?php $category = $categories[$i]; ?>
						<li>
							<a href="{{ baseUrl().$category['path'] }}?time={{ $date->timeStamp }}" class="themeWhats">{{ $category['name'] }} ({{ $category['numberOfArticles'] }})</a>
						</li>						
					@endfor
				</ul>
			</div>
		</div>
	</section>
@endforeach

@include('channels.partials.sub-nav')

@endsection

@include('layouts.footer')