@section('header')

<section class="header">
    <header>      
        <div id="logo">
            <a href="{{ baseUrl() }}">
                <img src="{{ assetPath() }}a/i/layout/bristol-24-7.png" />
            </a>
        </div>

        <a onclick="showmenu('menu')">
            <div id="show-mob-menu"><img src="{{ assetPath() }}a/i/layout/menu.png"/></div>
        </a>

        <a onclick="hidemenu('menu')">
        <div id="hide-mob-menu"><img src="{{ assetPath() }}a/i/layout/menu.png"/></div>
        </a>

        <nav id="nav">
            <ul>
                @foreach( $nav AS $item )
                    <li>
                        <a class="{{ themeClass($item['sefName']) }}" href="{{ $item['path'] }}">{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </nav>

        <mobnav id="mob-nav">
            <ul>
                @foreach( $nav AS $item )
                    <li>
                        <a class="{{ themeClass($item['sefName']) }}" href="{{ $item['path'] }}">{{ $item['name'] }}</a>
                    </li>
                @endforeach
            </ul>
        </mobnav>

        <div class="toolsNav" >
            <a class="searchLink" onclick="showsearch('menu')" id="showsearch"><img src="{{ assetPath() }}a/i/icons/search-icon.png"/></a>
            <a class="searchLink" onclick="hidesearch('menu')" id="hidesearch">
                <img src="{{ assetPath() }}a/i/icons/close-search.png"/>
            </a>
        </div>

        <div class="newsletter" id="newsletter">
            <a class="opennl" onclick="shownl('nl')" >
                <img src="{{ assetPath() }}a/i/icons/nl-icon.png"/>
            </a>
            <div class="nav-item-nl">
                <a class="opennl" onclick="shownl('nl')" >Newsletter</a>
            </div>
            
            <div id="nl-popup">
                <link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
                <style type="text/css">
                    #mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
                </style>
                <div id="mc_embed_signup">
                    <form action="//bristol-culture.us7.list-manage.com/subscribe/post?u=7b935cfb4a332a0d1c952d2d9&amp;id=67a9a4e1bd" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" novalidate>
                        <div id="mc_embed_signup_scroll">
                            <h2>Subscribe</h2>
                            <div class="mc-field-group">
                                <label for="mce-EMAIL">Email Address </label>
                                <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                            </div>
                            <div id="mce-responses" class="clear">
                                <div class="response" id="mce-error-response" style="display:none"></div>
                                <div class="response" id="mce-success-response" style="display:none"></div>
                            </div>
                            <div style="position: absolute; left: -5000px;"><input type="text" name="b_7b935cfb4a332a0d1c952d2d9_67a9a4e1bd" tabindex="-1" value=""></div>
                            <div class="clear">
                                <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
                            </div>
                        </div>
                    </form>
                </div>
                <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                <script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                
                <a onclick="hidenl('nl')" class="close">Close x</a>
            </div>
        </div>

        <div class="toolssearch" id="search">
            <form action="/search" method="post" class="searchContainer">
                <input type="text" class="text" value="" placeholder="Search" name="search">
                <input type="submit" class="primaryButton" value="Go">
            </form>
        </div>      
    </header>
</section>

@if(isset($activeChannel) and !isset($showSubChannel) and !isset($showCategory))
    @include('channels.partials.sub-nav')
@endif

@if(isset($showAccountNav))
    @include('user.partials.sub-nav')
@endif

@endsection