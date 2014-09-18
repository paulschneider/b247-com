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
									$subChannelCats = [];
								?>
								@for($i = 0; $i <= count($channel['subChannels'])-1; $i++)

										<?php $subChannelCats[] = isset($channel['subChannels'][$i]['categories']) ? $channel['subChannels'][$i]['categories'] : [] ?>

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
							<ul class="optionList">

							<?php 
								$sCategories = []; // sorted categories

								foreach($subChannelCats AS $categoryList)
								{
									foreach($categoryList AS $item)
									{
										if(!array_key_exists($item['sefName'], $sCategories)) {
											$sCategories[$item['sefName']] = $item;		
										}										
									}		
								}
							?>										
								<li>
									<ul>
										<?php 
											$cats = array_values($sCategories);											
											$perColumn = Ceil(count($sCategories)/3); $s=0; 
										?>

										@foreach($sCategories AS $category)		
								
											<li class="category-option {{ $category['isEnabled'] ? 'optionOn' : '' }}">
												<span class="icoVis"></span>
												<a href="#">{{ $category['name'] }}</a>
												<input type="checkbox" name="categories[channel-{{ $channel['id'] }}][]" value="{{ $category['name'] }}" {{ ! $category['isEnabled'] ? 'checked="checked"' : '' }}>
											</li>
									<?php $s++; ?>
									@if($s == $perColumn || $s == count($sCategories))
									</ul>
								</li>
								<li>
									<ul>
										<?php $s = 0 ?>
									@endif											
									@endforeach						
							</ul>
						</div>
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