<div class="dateBlock">
    @if( ! $article['event']['details']['performances']['summary']['isMultiDate'] )

        <?php $date = getEventDate($article['event']['details']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>
        
    @else                    
        <?php $date = getEventDate($article['event']['details']['performances']['summary']['firstPerformance']['start']['epoch']) ?>

        <div class="dateEntry">
            {{ $date->dayOfWeek['short'] }} {{ $date->day }}<br>
            <span>{{ $date->month['short'] }}</span>
        </div>

        <div class="dateDivider">-</div>

        <?php $date = getEventDate($article['event']['details']['performances']['summary']['lastPerformance']['start']['epoch']) ?>

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
    <a href="#">Tickets</a>
</p>