@if(isset($pagination))    
    <div class="page-footer">
        <ul>
            <li class="previous">
                @if(is_null($pagination['prevPage']))
                    <span class="disabled">Previous</span>
                @else
                    <a href="{{ baseUrl().'/'.$route }}/page/{{ $pagination['prevPage'] }}">< Previous</a>
                @endif
            </li>
            <li class="page-number">
                <a href="">Page {{ $pagination['currentPage'] }}</a>
            </li>
            <li class="next">
                @if( $pagination['currentPage'] == $pagination['totalPages'] )
                    <span class="disabled">Next</span>
                @else
                    <a href="{{ baseUrl().'/'.$route }}/page/{{ $pagination['nextPage'] }}">Next ></a>
                @endif                
            </li>
        </ul>
    </div>
@endif