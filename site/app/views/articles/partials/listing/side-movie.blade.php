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
    <h2>{{ $article['event']['venue']['name'] }}</h2>
    <br />
    <p>
        <strong>Rating</strong>: {{ $performances['summary']['certificate'] }}<br />
        <strong>Directed By</strong>: <br />{{ $performances['summary']['director'] }}<br />
        <strong>Running Time</strong>: {{ number_format($performances['summary']['duration']/60, 2) }} mins<br />
    </p>
    @if(isset($article['event']['details']['performances']['alternativeVenues']))
        <h3><strong>Also playing at...</strong></h3>
        <br />
        <ul>
            @foreach($performances['alternativeVenues'] AS $alternative)                    
                <li>{{ $alternative['venue']['name'] }}</li>
            @endforeach
        </ul>
    @endif
</div>