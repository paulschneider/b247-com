<div class="emailVoucher">                
    <!-- the user has to be logged in -->
    @if( Auth::check())                    
        <img width="315px" height="85px" alt="Email me a voucher" src="/i/layout/email-voucher.png">
        <a href="{{ baseUrl() }}promotion/redeem/voucher/{{ $article['promotion'][0]['code'] }}">Email me a voucher</a>
    @else
        <a href="">Log-In to get the voucher!</a>
    @endif
</div>            