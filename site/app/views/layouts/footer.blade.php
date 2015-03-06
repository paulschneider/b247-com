@section('footer')

@if(isset($activeChannel) and !isset($showSubChannel) and !isset($showCategory))
    @include('channels.partials.sub-nav-lower')
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

@endsection