@if( isset($related) and count($related) > 0) 

    <h6 class="more">Like this? You might be interested in...</h6>
    
    @foreach( $related AS $r )

        <?php 
            $subChannel = getArticleSubChannel($r);
            $category = getArticleCategory($r);
        ?>

        <div class="related-col">
            <a href="{{ $r['path'] }}">
                @if(isset( $r['media']['filepath'] ))
                    <img src="{{ $r['media']['filepath'] }}" alt="$r['media']['filepath']" />
                @endif
            </a>

            <div class="content-row">
                <h1>
                    <a href="{{ $r['path'] }}">{{ $r['title'] }}</a>
                </h1>
                <h2 class="hide_mobile">{{ $r['subHeading'] }}</h2>
                <h3>{{ $subChannel->name }} - {{ $category->name }}</h3>
            </div>
        </div> 
    @endforeach
@endif