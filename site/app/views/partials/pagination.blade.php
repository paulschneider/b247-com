@if(isset($pagination))
    <nav class="pagination">
        <hr class="spacer">
        <div class="grid">
            <div class="col-16-20 colFirst tabCol-18-20 tabColFirst mobColFirst">
                @if(is_null($pagination['prevPage']))
                    <span class="primaryButton disabledButton fl">< Previous</span>
                @else
                    <a class="primaryButton fl" href="{{ baseUrl().'/'.$route }}/page/{{ $pagination['prevPage'] }}">< Previous</a>
                @endif
                
                Page {{ $pagination['currentPage'] }}
                
                @if( $pagination['currentPage'] == $pagination['totalPages'] )
                    <span class="primaryButton disabledButton fr">Next ></span>
                @else
                    <a class="primaryButton fr" href="{{ baseUrl().'/'.$route }}/page/{{ $pagination['nextPage'] }}">Next ></a>
                @endif            
            </div>
        </div>
    </nav>
@endif