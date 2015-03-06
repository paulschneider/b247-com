@if (isset($adverts[0]))
    <?php $advert = $adverts[0] ?>
    @include("adverts.partials.letterbox")
@endif

<section>
    <div class="article <?php echo getTheme($article) ?>">
        <div id="define-col-1">
            <img src="{{ $article['gallery']['top']['0']['filepath'] }}" width="100%" alt="{{ $article['gallery']['top']['0']['alt'] }}" />

            <div class="spacer"></div>

            <div class="art-col-1">
                @if (! $isMobile) <!-- only show for the web version -->
                    @include('articles.partials._global.share')
                @endif
            </div>

            <div class="art-col-2">
                <div class="art-upper" style="padding-bottom:26px;">
                    <h1>
                        <span class="alt-color">{{ $article['assignment']['category']['name'] }}:</span> 
                        {{ $article['title'] }}
                    </h1>
                </div> 

                <div class="art-upper"> 
                    <h2>
                        {{ $article['author'] }}, {{ getPublishedDate($article['published']) }}
                        <div class="art-nav">
                            @if ( ! $isMobile ) 
                            <a href="{{ isset($navigation['previous']['article']['path']) ? $navigation['previous']['article']['path'] : '/no-where' }}">< previous article</a>
                            |   
                            <a href="{{ isset($navigation['next']['article']['path']) ? $navigation['next']['article']['path'] : '/no-where' }}">next article ></a>
                            @endif
                        </div>
                    </h2>
                </div>
                  
                <span class="body">
                    {{ $article['body'] }}
                    {{ $article['bodyContinued'] }}
                </span>

                @include('articles.partials._global.category-list')
                
            </div>
        </div>

        <div id="define-col-2">

            @if(Input::get('time'))
                <?php $date = getEventDate(Input::get('time')) ?>
            @endif           

            <attributes>
                <h7>
                    @if( isset($article['event']['details']['performances']) )
                        <?php $event = $article['event']['details']['performances']['summary'] ?>
                        @if( ! $event['isMultiDate'] )
                            <?php $date = getEventDate($article['event']['details']['epoch']) ?>
                            {{ $date->dayOfWeek['short'] }} {{ $date->day }} {{ $date->month['short'] }}
                        @else 
                            <?php $date = getEventDate($event['firstPerformance']['start']['epoch']) ?>
                            {{ $date->dayOfWeek['short'] }} {{ $date->day }} {{ $date->month['short'] }}
                            -
                            <?php $date = getEventDate($event['lastPerformance']['start']['epoch']) ?>
                            {{ $date->dayOfWeek['short'] }} {{ $date->day }} {{ $date->month['short'] }}
                        @endif
                    @endif        
                </h7>
                <div class="spacer-row"></div>
                <h8>Showing at</h8>                
                @if( isset($article['event']['venues']) )
                    <?php $performances = $article['event']['venues']; ?>

                    @foreach($performances AS $performance)                    
                    <h9>
                        @if(!empty($performance['venue']['website']))
                            <a href="{{ $performance['venue']['website'] }}">{{ $performance['venue']['name'] }}</a>
                        @else
                            {{ $performance['venue']['name'] }}
                        @endif
                    </h9>
                @endforeach
                @else
                    <h9>{{ $article['event']['venue']['name'] }}</h9>
                @endif               
                
                <div class="spacer-row"></div>        
   
            </attributes>

            @include('articles.partials._global.related')
        </div>
    </div>

    @include("articles.partials._global.comments")

</section>

@include("articles.partials._global.comments")
