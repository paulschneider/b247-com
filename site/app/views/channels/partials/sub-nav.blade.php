@if( isset($showSubChannel) || isset($showCategory) )
	<nav class="subHeader subHeaderFooter">
	    <ul>
	    @foreach($channel['subChannels'][0]['categories'] AS $category)
	        <li>
	            <a href="{{ baseUrl().$category['path'] }}">{{ $category['name'] }}</a>
	        </li>
	    @endforeach
	</nav>
@endif