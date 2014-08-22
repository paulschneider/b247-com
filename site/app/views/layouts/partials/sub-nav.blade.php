@if(isset($subChannels))
	<nav class="subHeader">
		<ul>
		@foreach($subChannels AS $subChannel)
		        <li>
		            <a href="{{ baseUrl().$subChannel['path'] }}">{{ $subChannel['name'] }}</a>
		        </li>
		    @endforeach
		</ul>
	</nav>
@endif