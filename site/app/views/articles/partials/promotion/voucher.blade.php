<div class="emailVoucher">                
    <!-- the user has to be logged in -->
    @if( userIsAuthenticated() )                    
        <img width="315px" height="85px" alt="Email me a voucher" src="{{ baseUrl() }}/i/layout/email-voucher.png">
        @if ( $isMobile) )
        	<a href="b247://redeem/{{ $article['promotion'][0]['code'] }}">Email me a voucher</a>
        @else
        	<a href="{{ baseUrl() }}/promotion/redeem/voucher/{{ $article['promotion'][0]['code'] }}">Email me a voucher</a>
        @endif
    @else
    	@if ( $isMobile) )
        	<a href="b247://signin">Log-In to get the voucher!</a>
        @else
        	<a href="{{ route('login') }}">Log-In to get the voucher!</a>
        @endif
    @endif
</div>            