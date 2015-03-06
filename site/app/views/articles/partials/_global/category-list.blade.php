@if(isset($article['categoryAssignment']))
    <div id="category-col">
        <ul>
            @foreach($article['categoryAssignment'] AS $assignment)
                <li>
                    <a href="{{ baseUrl().$assignment['path'] }}">{{ $assignment['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endif