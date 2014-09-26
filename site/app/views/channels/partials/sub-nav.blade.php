<nav class="subHeader subHeaderFooter">
    <ul>
    @foreach($subChannels AS $subChannel)
        <li>
            <a href="{{ baseUrl().$subChannel['path'] }}">{{ $subChannel['name'] }}</a>
        </li>
    @endforeach
</nav>
