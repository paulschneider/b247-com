@section('header')

<header role="banner" id="top">      
  <div class="headerBar">
    <a class="visuallyHidden skipNavigation" href="#main">Skip to content</a>        
    <a id="logo" href="/"><img alt="Bristol 24/7" src="{{ assetPath() }}i/layout/bristol-24-7.png"></a>      
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
                <a href="{{ baseUrl() }}/profile">{{ $user['firstName'] .' '. $user['lastName'] }} <span class="icoProfile"></span></a>
            @elseif ($page != 'register' and $page != 'login')
                <a class="launchWindow" data-content="modalWindowContent" href="{{ baseUrl() }}/login">
                    Sign in/register 
                    <span class="icoProfile"></span>
                </a>
            @endif        
        </li>
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

@if(isset($subChannels))
    <nav class="subHeader top-head">
        <ul>
        @foreach($subChannels AS $subChannel)
                <li>
                    <a href="{{ baseUrl().$subChannel['path'] }}">{{ $subChannel['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif

@endsection