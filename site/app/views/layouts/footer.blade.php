@section('footer')

@include('channels.partials.sub-nav')

<footer id="bottom">
  <div class="grid">          
    <nav class="footerNav column col-4-20 colFirst tabCol-6-20 tabColFirst mobCol-18-20 mobColFirst">
      <ul>
      	<li>
          <a href="#" class="footerHome">Home</a>
        </li>
      	@foreach( $nav AS $item )
			<li class="{{ themeClass($item['sefName']) }}">
				<a href="{{ $item['sefName'] }}">{{ $item['name'] }}</a>
			</li>
	      @endforeach
      </ul>
    </nav>
    
    <div class="footerSubNav column col-8-20 tabCol-12-20 tabColLast mobCol-18-20 mobColFirst">
      <nav>
        <ul>
          <li>
            <a href="#">Sign in</a>
          </li>
          <li>
            <a href="#">Register</a>
          </li>
        </ul>
        <ul>
          <li>
            <a href="#">About us</a>
          </li>
          <li>
            <a href="#">Contact us</a>
          </li>
        </ul>
      </nav>
      
      <ul class="footerMoreDetails">
        <li>
          <a href="#">Download the app</a>
        </li>
        <li>
          <a href="#">Advertise on B24/7</a>
        </li>
      </ul>
      
      <ul class="footerSocial">
        <li>
          <a href="#" class="icoTwitter">Twitter<span></span></a>
        </li>
        <li>
          <a href="#" class="icoFacebook">Facebook<span></span></a>
        </li>
        <li>
          <a href="#" class="icoGooglePlus">Google+<span></span></a>
        </li>
      </ul>
      
      <ul class="footerRSS">
        <li>
          <a href="#" class="icoRSS">RSS<span></span></a>
        </li>
      </ul>
    </div>

    <div class="footerTerms column col-4-20 colLast tabCol-12-20 tabColLast mobCol-18-20 mobColFirst">
      <ul>
        <li>
          <a href="#">Terms &amp; conditions</a>
        </li>
        <li>
          <a href="#">Privacy Policy</a>
        </li>
      </ul>
      <p>
        <span class="copyArea">
          <span class="footerCopy">&copy; Copyright 2014</span>
          <span class="footerBristol">Bristol 24/7 CIC.</span>
        </span>
        <span class="footerCompany">Company no: 08904329.</span>
        <span class="footerAddress">
          <span class="footerAddress1">Unit 2.4 Paintworks,</span>
          <span class="footerAddress2">Arnos Vale, Bath Road,</span>
          <span class="footerAddress3">Bristol BS4 3EN</span>
        </span>
      </p>
      
    </div>
  </div>
</footer>
@endsection