<div class="dateBlock">

    <?php $event = $article['event']['details']['performances']['summary'] ?>

    @if( ! $event['isMultiDate'] )

        <?php $date = getEventDate($event['details']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>
        
    @else                    
        <?php $date = getEventDate($event['firstPerformance']['start']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>

        <div class="dateDivider">-</div>

        <?php $date = getEventDate($event['lastPerformance']['start']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>
    @endif
</div>

<h5>
    @if(!empty($article['event']['venue']['website']))
        <a href="{{ $article['event']['venue']['website'] }}">$article['event']['venue']['name']</a>
    @else
        {{ $article['event']['venue']['name'] }}
    @endif
</h5>
<p>
    from &pound;{{ $article['event']['details']['price'] }}<br>
    <a href="{{ $article['event']['details']['url'] }}">Tickets</a>
</p>
@if(!is_null($event['showingToday']))
    <h3>Showing Today</h3>
    <ul>
        @foreach($event['showingToday'] AS $show)
            <li>{{ $show['start']['time'] }}</li> 
        @endforeach
    </ul>
@endif