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

<h5>{{ $article['event']['venue']['name'] }}</h5>
<p>
    {{ $date->time }} <br>
    &pound;{{ $article['event']['details']['price'] }}<br>
    <a href="#">Tickets</a>
</p>