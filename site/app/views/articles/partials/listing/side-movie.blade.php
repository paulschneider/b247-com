<div class="dateBlock">   

    @if(Input::get('time'))
        <?php $date = getEventDate(Input::get('time')) ?>
        <h2>{{ $date->dayOfWeek['short'] }} {{ $date->day }} {{ $date->month['short'] }}</h2>
    @endif

    @if( ! $article['event']['summary']['isMultiDate'] )
        
        <?php $date = getEventDate($article['event']['details']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>
        
    @else    

        <?php $date = getEventDate($article['event']['details']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>

        <div class="dateDivider">-</div>

        <?php $date = getEventDate($article['event']['venues'][0]['showRunEnd']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>
    @endif
</div>

<div class="movie-block">
    <?php $performances = $article['event']['venues']; ?>
    <br />
    <ul>  
        @foreach($performances AS $performance)                    
            <li>
                @if(!empty($performance['venue']['website']))
                    <a href="{{ $performance['venue']['website'] }}">{{ $performance['venue']['name'] }}</a>
                @else
                    {{ $performance['venue']['name'] }}
                @endif
            </li>
        @endforeach
    </ul>
    <br />
    <br />
    <p>
        <strong>Rating</strong>: {{ $article['event']['summary']['certificate'] }}<br />
        <strong>Directed By</strong>: <br />{{ $article['event']['summary']['director'] }}<br />
        <strong>Running Time</strong>: {{ $article['event']['summary']['duration'] }} mins<br />
    </p>    
</div>