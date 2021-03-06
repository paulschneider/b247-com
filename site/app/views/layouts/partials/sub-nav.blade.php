@if(isset($subChannels))
	<section class="sub-header-bk sh-ft-adj">
		<div class="sub-header">
			<ul>
				@foreach($subChannels AS $subChannel)
			        <li>
			            <a href="{{ baseUrl().$subChannel['path'] }}">{{ $subChannel['name'] }}</a>
			        </li>
			    @endforeach
			</ul>
		</div>
	</section>
@elseif($activeNav == "profile" || $activeNav == "prefs" || $activeNav == "password")
	@include("user.partials.sub-nav") 
@endif