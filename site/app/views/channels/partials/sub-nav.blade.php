@if( isset($subChannels) and count($subChannels) > 0 )
	<section class="sub-header-bk">
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
@endif