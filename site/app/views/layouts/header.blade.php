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
            <img src="{{ assetPath() }}a/i/icons/nl-icon.png"/> 
            <div class="nav-item-nl">Newsletter</div>
        </div>

        <div class="toolssearch" id="search">
            <form action="/search" method="post" class="searchContainer">
                <input type="text" class="text" value="" placeholder="Search" name="search">
                <input type="submit" class="primaryButton" value="Go">
            </form>
        </div>      
    </header>
</section>

<?php /*
<header role="banner" id="top">      
  <div class="headerBar">
    <a class="visuallyHidden skipNavigation" href="#main">Skip to content</a>        
    <a id="logo" href="/"><img alt="Bristol 24/7" src="{{ assetPath() }}a/i/layout/bristol-24-7.png"></a>      
    <a class="toggleMenuOn" href="#">Show menu<span class="icoMenu"></span></a>        
    <nav class="primaryNav" role="navigation">
        <ul>
        @foreach( $nav AS $item )
		    <li class="{{ themeClass($item['sefName']) }}">
		      <a href="{{ $item['path'] }}">{{ $item['name'] }}</a>
		    </li>
        @endforeach
        </ul>
    </nav>
    
    <ul class="toolsNav">
        <li>
            @if( Session::has('user') )
                <?php $user = Session::get('user') ?>
                <a class="profileLink" href="{{ baseUrl() }}/profile">{{ $user['firstName'] .' '. $user['lastName'] }} <span class="icoProfile"></span></a>
            @elseif (isset($page) and $page != 'register' and $page != 'login')
                <a class="launchWindow profileLink" data-content="modalWindowContent" href="{{ baseUrl() }}/login">
                    Sign in/register 
                    <span class="icoProfile"></span>
                </a>
            @endif        
        </li>
        @if( Session::has('user') )
            <li>
                <a href="{{ baseUrl() }}/logout">Sign Out</a>
            </li>
        @endif
        <li>
            <a class="searchLink" href="#">Search <span class="icoSearch"></span></a>
        </li>
    </ul>
    
    <form action="/search" method="post" class="searchContainer">
        <input type="text" class="text" value="" placeholder="Search" name="search">
        <input type="submit" class="primaryButton" value="Go">
        <a class="searchClose icoSearchHide" href="#">Hide</a>
    </form>

    </div>      
</header>    

*/ ?>

@if(isset($activeChannel) and !isset($showSubChannel) and !isset($showCategory))
    @include('layouts.partials.sub-nav')
@endif

@if(isset($showAccountNav))
    @include('user.partials.sub-nav')
@endif

@endsection