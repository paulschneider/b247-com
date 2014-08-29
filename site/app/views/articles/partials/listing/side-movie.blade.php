<div class="dateBlock">   
    @if( ! $article['event']['details']['performances']['summary']['isMultiDate'] )
        
        <?php $date = getEventDate($article['event']['details']['performances']['summary']['show']['startTime']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>
        
    @else    

        <?php $date = getEventDate($article['event']['details']['performances']['summary']['show']['startTime']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>

        <div class="dateDivider">-</div>

        <?php $date = getEventDate($article['event']['details']['performances']['summary']['show']['showRunEnd']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>
    @endif
</div>

<div class="movie-block">
    <?php $performances = $article['event']['details']['performances']; ?>
    <br />
    <ul>  
        <li>
            @if(!empty($article['event']['venue']['website']))
                <a href="{{ $article['event']['venue']['website'] }}">{{ $article['event']['venue']['name'] }}</a>
            @else
                {{ $article['event']['venue']['name'] }}
            @endif
        </li>
        @if(isset($article['event']['details']['performances']['alternativeVenues']))
            @foreach($performances['alternativeVenues'] AS $alternative)                    
                <li>
                    @if(!empty($alternative['venue']['website']))
                        <a href="{{ $alternative['venue']['website'] }}">{{ $alternative['venue']['name'] }}</a>
                    @else
                        {{ $alternative['venue']['name'] }}
                    @endif
                </li>
            @endforeach
         @endif   
    </ul>
    <br />
    <br />

    <p>
        <strong>Rating</strong>: {{ $performances['summary']['certificate'] }}<br />
        <strong>Directed By</strong>: <br />{{ $performances['summary']['director'] }}<br />
        <strong>Running Time</strong>: {{ $performances['summary']['duration'] }} mins<br />
    </p>    
</div>