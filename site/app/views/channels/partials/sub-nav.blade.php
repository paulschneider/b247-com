@if( isset($activeChannel) )
	<nav class="subHeader subHeaderFooter">
	    <ul>
	    @foreach($channel['subChannels'] AS $subChannel)
	        <li class="<?php echo $subChannel['sefName'] == $activeChannel ? 'active' : '' ?>">
	            <a href="{{ baseUrl().$subChannel['path'] }}">{{ $subChannel['name'] }}</a>
	        </li>
	    @endforeach
	</nav>
@endif