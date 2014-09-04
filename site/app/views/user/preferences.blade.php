@extends('layouts.default')

@include('layouts.header')

@section('content')

<section id="user-preferences" class="user-account">
	<form name="districts" method="post">
		<input type="hidden" name="id" value="1" />
		<header class="modalHeader">
	        <div class="grid">
	            <div class="headerContent column col-16-20 colSpacing2 mobColFirst">
	                <h2 class="secondaryHeader">
	                    <strong class="blackHighlight">Your Profile</strong>
	                </h2>
	            </div>
	        </div>
	        
	        <hr>
	    </header>

		<div class="grid">
			<aside class="column col-4-20 colFirst tabCol-18-20 tabColFirst mobColFirst">
					
				<h1 class="quinaryHeader">Your Comms</h1>
				<p class="infoText">Choose which of our emails you want to receive. You can opt in and out of these at any time.</p>			
				<ul class="optionList" id="broadcast-list" data-max="999">
					<li>
						<ul>				
							@foreach($broadcasts AS $broadcast)
								<li {{ $broadcast['isEnabled'] ? 'class="optionOn"' : '' }}>
									<a href="#">{{ $broadcast['title'] }}</a>
									<input type="checkbox" name="broadcast[]" value="{{ $broadcast['id'] }}" {{ $broadcast['isEnabled'] ? 'checked="checked"' : '' }} />
								</li>
							@endforeach					
						</ul>
					</li>
				<ul>

				<hr />

				<h1 class="quinaryHeader">Customise your content</h1>
				<p class="infoText">Select up to <strong>three</strong> regions of Bristol that you are most interested in and we will prioritise the delivery of content for you:</p>			
				<ul class="optionList" id="district-list" data-max="3">
					<li>
						<ul>				
							@foreach($districts AS $district)
								<li {{ $district['isPromoted'] ? 'class="optionOn"' : '' }}>
									<a href="#">{{ $district['name'] }}</a>
									<input type="checkbox" name="district[]" value="{{ $district['id'] }}" {{ $district['isPromoted'] ? 'checked="checked"' : '' }} />
								</li>
							@endforeach					
						</ul>
					</li>
				<ul>			
			</aside>

			<div class="column col-12-20 colLast tabCol-18-20 tabColFirst mobColFirst">
			<?php $s = 0; ?>
			@foreach($channels AS $channel)	
				<section class="optionBlock {{ $s == 0 ? 'optionBlockOpen' : '' }} {{ themeClass($channel['sefName']) }}">
					<header class="optionHeader">
						<a class="optionShow" href="#">
							<h1 class="primaryHeader">
								<span class="icoOnOff"></span>
								{{ $channel['name'] }}
							</h1>
							<p>{{ $channel['description'] }}</p>
						</a>
						<div class="optionToggle channel {{ $channel['isEnabled'] ? 'optionToggleOn' : '' }}">
							<a class="optionOff" href="#">Off</a>
							<a class="optionOn" href="#">On</a>
							<input type="checkbox" name="channel[]" value="{{ $channel['id'] }}" {{ ! $channel['isEnabled'] ? 'checked="checked"' : '' }} />
						</div>
					</header>
					
					<div class="optionContent channel-{{ $channel['id'] }}">
						<div class="optionSubchannels">
							<p class="moreSectionInto">Choose what sub-channels are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>
							<ul class="optionList">
								<li>
									<ul>

								<?php 
									$perColumn = Ceil(count($channel['subChannels'])/3); $s=1; 
									$subChannels = [];
								?>
								@for($i = 0; $i <= count($channel['subChannels'])-1; $i++)

										<?php $subChannels[] = $channel['subChannels'][$i]; ?>

										<li class="{{ $channel['subChannels'][$i]['isEnabled'] ? 'optionOn' : '' }}">
											<span class="icoVis"></span>
											<a href="#">{{ $channel['subChannels'][$i]['name'] }}</a>
											<input type="checkbox" name="subChannel[]" value="{{ $channel['subChannels'][$i]['id'] }}" {{ ! $channel['subChannels'][$i]['isEnabled'] ? 'checked="checked"' : '' }} />
										</li>							
									@if($s == $perColumn)
									</ul>
								</li>
								<li>
									<ul>
										<?php $s = 0 ?>
									@endif
									<?php $s++; ?>
								@endfor
							</ul>
						</div>

						<div class="optionCategory">
							<p class="moreSectionInto">Choose what categories are <span class="optionStateVisible">visible<span></span></span> and <span class="optionStateHidden">hidden</span> :</p>

							@foreach($subChannels AS $subChannel)
								<?php $cats = $subChannel['categories'] ?>
								<div class="cat-list" id="sub-channel-{{ $subChannel['id'] }}">
									<h2><strong>Categories</strong>: {{ $subChannel['name'] }}</h2>
									<ul class="optionList">
										<li>
											<ul>
												<?php 
													$cats = array_values($cats);
													$perColumn = Ceil(count($cats)/3); $s=1; 
												?>

												@for($i = 0; $i <= count($cats)-1; $i++)
										
												<li class="category-option {{ $cats[$i]['isEnabled'] ? 'optionOn' : '' }}">
													<span class="icoVis"></span>
													<a href="#">{{ $cats[$i]['name'] }}</a>
													<input type="checkbox" name="categories[sub-channel-{{ $subChannel['id'] }}][]" value="{{ $cats[$i]['id'] }}" {{ ! $cats[$i]['isEnabled'] ? 'checked="checked"' : '' }}>
												</li>

											@if($s == $perColumn || $s == count($cats))
											</ul>
										</li>
										<li>
											<ul>
												<?php $s = 0 ?>
											@endif
											<?php $s++; ?>
										@endfor
									</ul>
								</div>
							@endforeach
						</div>

						<?php 
						/*<div class="optionMoreGreat">
							<p class="moreSectionInto">More great Food &amp; Drink</p>
							<div class="carouselContainer">
								<div class="moreGreatList">
									<div class="articleList">

										<div class="column col-10-20 mobCol-18-20 mobColFirst">
											<h3 class="tertiaryHeader">Feature 1</h3>
											<div class="moreFeatureBox">
												<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
												<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
												<div class="optionToggle">
													<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
													<a class="optionOn" data-input="moreGreat1" href="#">On</a>
												</div>
												<!--<form class="hidden" action="" method="">
													<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
												</form>-->
											</div>
										</div>

										<div class="column col-10-20 mobCol-18-20 mobColFirst">
											<h3 class="tertiaryHeader">Feature 1</h3>
											<div class="moreFeatureBox">
												<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
												<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
												<div class="optionToggle">
													<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
													<a class="optionOn" data-input="moreGreat2" href="#">On</a>
												</div>
												<!--<form class="hidden" action="" method="">
													<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
												</form>-->                                
											</div>
										</div>

									</div> <!-- .articleList -->

									<div class="articleList">
										<div class="column col-10-20 mobCol-18-20 mobColFirst">
											<h3 class="tertiaryHeader">Feature 1</h3>
											<div class="moreFeatureBox">
												<img width="80px" alt="Bristol Foodie" src="/a/i/placeholders/more-great/bristol-foodie.jpg">
												<p class="moreText">Founded over a bottle of Pinot and a mutual love of all things edible, Becci and Gemma hope to bring you an eclectic mix.</p>
												<div class="optionToggle">
													<a class="optionOff" data-input="moreGreat1" href="#">Off</a>
													<a class="optionOn" data-input="moreGreat1" href="#">On</a>
												</div>
												<!--<form class="hidden" action="" method="">
													<input id="moreGreat1" type="checkbox" value="0" name="moreGreat1">
												</form>-->
											</div>
										</div>

										<div class="column col-10-20 mobCol-18-20 mobColFirst">
											<h3 class="tertiaryHeader">Feature 1</h3>
											<div class="moreFeatureBox">
												<img width="80px" alt="Eat Drink Bristol Fashion" src="/a/i/placeholders/more-great/eat-drink.jpg">
												<p class="moreText">A collaborative project that champions sustainable food production, ethical food systems and food traceability.</p>
												<div class="optionToggle">
													<a class="optionOff" data-input="moreGreat2" href="#">Off</a>
													<a class="optionOn" data-input="moreGreat2" href="#">On</a>
												</div>
												<!--<form class="hidden" action="" method="">
													<input id="moreGreat2" type="checkbox" value="0" name="moreGreat2">
												</form>-->                                
											</div>
										</div>
									</div> <!-- .articleList -->
								</div>
							</div> <!-- /.carouselContainer -->
						</div>
						*/?>
					</div>
				</section>
				<?php $s++ ?>
			@endforeach
			<div class="formAction cf">
	            <input type="submit" class="primaryButton" value="Save Changes" />
	        </div>
		</div		
	</form>
</section>

@endsection

@include('layouts.footer')