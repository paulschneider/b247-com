@section('footer')

@if(isset($activeChannel) and !isset($showSubChannel) and !isset($showCategory))
  @include('layouts.partials.sub-nav')
@endif

<section id="footer">
    <footer>  
    <div class="footer-col-1">
        <ul>
            <li><a href="{{ baseUrl() }}">Home</a></li>
            @foreach( $nav AS $item )
                <li>
                    <a href="{{ $item['path'] }}" class="{{ themeClass($item['sefName']) }}">{{ $item['name'] }}</a>
                </li>
              @endforeach
        </ul>
    </div>

    <div class="footer-col-2">
        <ul>
            <li><a href="{{ baseUrl() }}/about-us">About us</a></li>
            <li><a href="">&nbsp;</a></li>
            <li><a href="{{ baseUrl() }}/contact-us">Contact us</a></li>
            <li><a href="">&nbsp;</a></li>
        </ul>
    
        <div class="spacer-footer"></div>
        
        <ul>
            <li><a href="{{ baseUrl() }}/download-the-app">Download the app</a></li>
            <li><a href="{{ baseUrl() }}/advertise">Advertise on B24/7</a></li>
        </ul>
        
        <div class="spacer-footer"></div>
        
        <div class="social-icon">
            <a href="https://twitter.com/bristol247">
                <img src="http://admin-wildfirecomms.co.uk/final/m/i/twitter.jpg"/>
            </a>
        </div>
        
        <div class="social-icon">
            <a href="https://www.facebook.com/bristol247">
                <img src="http://admin-wildfirecomms.co.uk/final/m/i/facebook.jpg" />
            </a>
        </div>
        
        <div class="social-icon">
            <a href="https://plus.google.com/u/0/+Bristol247/about">
                <img src="http://admin-wildfirecomms.co.uk/final/m/i/google.jpg"/>
            </a>
        </div>
    
        <div class="social-icon">
            <a href="">
                <img src="http://admin-wildfirecomms.co.uk/final/m/i/instagram.jpg" />
            </a>
        </div>

    </div>

    <div class="footer-col-3">
        <ul>
            <li><a href="{{ baseUrl() }}/terms-and-conditions">Terms &amp; conditions</a></li>
            <li><a href="{{ baseUrl() }}/privacy-policy">Privacy policy</a></li>
            <li><a href="{{ baseUrl() }}/cookie-policy">We use cookies, please read our Cookie Policy</a></li>
            <li>&copy; Copyright 2014</li>
            <li>Bristol 24/7 CIC.
                Company no: 08904329.
            </li>
            <li>
                Unit 2.4 Paintworks,</br>
                Arnos Vale, Bath Road,</br>
                Bristol BS4 3EH
            </li>
        </ul>
    </div>
      
    </footer>    

    <?php /* <footer id="bottom">
      <div class="grid">          
        <nav class="footerNav column col-4-20 colFirst tabCol-6-20 tabColFirst mobCol-18-20 mobColFirst">
          <ul>
          	<li>
              <a href="{{ baseUrl() }}" class="footerHome">Home</a>
            </li>
          	@foreach( $nav AS $item )
    			<li class="{{ themeClass($item['sefName']) }}">
    				<a href="{{ $item['path'] }}">{{ $item['name'] }}</a>
    			</li>
    	      @endforeach
          </ul>
        </nav>
        
        <div class="footerSubNav column col-8-20 tabCol-12-20 tabColLast mobCol-18-20 mobColFirst">
          <nav>
            <ul>
            @if( ! userIsAuthenticated() )            
                <li>
                    <a href="/login">Sign in</a>
                </li>
                <li>
                    <a href="/sign-up">Register</a>
                </li>
            @else
                <li>
                    <a href="/logout">Log Out</a>
                </li>
            @endif 
            </ul>
            <ul>
              <li>
                <a href="{{ baseUrl() }}/about-us">About us</a>
              </li>
              <li>
                <a href="{{ baseUrl() }}/contact-us">Contact us</a>
              </li>
            </ul>
          </nav>
          
          <ul class="footerMoreDetails">
            <li>
              <a href="{{ baseUrl() }}/download-the-app">Download the app</a>
            </li>
            <li>
              <a href="{{ baseUrl() }}/advertise">Advertise on B24/7</a>
            </li>
          </ul>
          
          <ul class="footerSocial">
            <li>
              <a href="https://twitter.com/bristol247" class="icoTwitter">Twitter<span></span></a>
            </li>
            <li>
              <a href="https://www.facebook.com/bristol247" class="icoFacebook">Facebook<span></span></a>
            </li>
            <li>
              <a href="https://plus.google.com/u/0/+Bristol247/about" class="icoGooglePlus">Google+<span></span></a>
            </li>
          </ul>
          
        </div>

        <div class="footerTerms column col-4-20 colLast tabCol-12-20 tabColLast mobCol-18-20 mobColFirst">
          <ul>
            <li>
              <a href="{{ baseUrl() }}/terms-and-conditions">Terms &amp; conditions</a>
            </li>
            <li>
              <a href="{{ baseUrl() }}/privacy-policy">Privacy Policy</a>
            </li>
            <li>
              <a href="{{ baseUrl() }}/cookie-policy">Cookie Policy</a>
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
    </footer>*/?>
</section>

<!--@include("layouts.partials.modal")-->

@endsection