<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Bristol 24/7 <?php echo isset($pageTitle) ? '- '.$pageTitle : '' ?></title>

<!-- SEO/Social -->
    <!-- Meta -->
    <meta name="description" content="{{ isset($metaDescription) ? $metaDescription : '' }}">
    
    <!-- Open Graph -->
    @if(isset($article['body']))
        <meta property="og:image" content="{{ $article['media']['filepath'] }}" />
        <meta property="og:url" content="{{ baseUrl().$article['path'] }}" />        
        <meta property="og:site_name" content="Bristol 24/7" />
        <meta property="og:title" content="{{ $article['title'] }}" />
        <meta property="og:description" content="{{ str_limit(strip_tags($article['body']), $limit = 250, $end = '...') }}" />
        <meta property="og:type" content="website" />
        <meta property="fb:app_id" content="1514896978748938" />
    @endif

    <!-- Twitter Cards -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:url" content=""/>
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="{{ assetPath() }}a/i/icons/twitter-card.png"> 
    
<!-- Icons -->
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ assetPath() }}a/i/icons/favicon-16x16.ico" />
    <link rel="icon" href="{{ assetPath() }}a/i/icons/favicon-32.png" sizes="32x32">
    <!-- Touch icon for iOS 2.0+ and Android 2.1+ -->
    <link rel="apple-touch-icon-precomposed" href="path/to/favicon-152.png">
    <!-- IE 10 Metro tile icon (Metro equivalent of apple-touch-icon) -->
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta name="msapplication-TileImage" content="{{ assetPath() }}a/i/icons/favicon-144.png">
    <!-- Opera speed dial / Opera Coast icon -->
    <link rel="icon" sizes="195x195" href="{{ assetPath() }}a/i/icons/favicon-195.png">
    <link rel="icon" sizes="228x228" href="{{ assetPath() }}a/i/icons/favicon-228.png">
    <!-- For iPad with high-resolution Retina display running iOS = 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="{{ assetPath() }}a/i/icons/favicon-152.png">
    <!-- For iPad with high-resolution Retina display running iOS = 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ assetPath() }}a/i/icons/favicon-144.png">
    <!-- Chrome web store -->
    <link rel="apple-touch-icon-precomposed" sizes="128x128" href="{{ assetPath() }}a/i/icons/favicon-128.png">
    <!-- For iPhone with high-resolution Retina display running iOS = 7: -->
    <link rel="apple-touch-icon-precomposed" sizes="120x120" href="{{ assetPath() }}a/i/icons/favicon-120.png">
    <!-- For iPhone with high-resolution Retina display running iOS = 6: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ assetPath() }}a/i/icons/favicon-114.png">
    <!-- Google TV -->
    <link rel="apple-touch-icon-precomposed" sizes="96x96" href="{{ assetPath() }}a/i/icons/favicon-96.png">
    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ assetPath() }}a/i/icons/favicon-72.png">
    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="{{ assetPath() }}a/i/icons/favicon-57.png">
    
    <!-- Files -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ assetPath() }}a/c/boilerplate.css">
    <link rel="stylesheet" href="{{ assetPath() }}a/c/final.css">
    <link href='http://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ assetPath() }}a/c/owl.carousel.css">
    <!-- <link rel="stylesheet" href="{{ assetPath() }}a/c/additional.css"> -->
    <!-- <link rel="stylesheet" href="{{ assetPath() }}a/c/datepicker.css"> -->

    <script src="{{ assetPath() }}a/j/vendor/respond.min.js"></script>

    <!--[if lt IE 9]><script src="{{ assetPath() }}j/vendor/html5shiv-printshiv.js"></script><![endif]-->

    <script>
    function showsearch(id) {
    document.getElementById("search").style.display = 'block';
    document.getElementById("showsearch").style.display = 'none';
    document.getElementById("newsletter").style.display = 'none'; 
    document.getElementById("hidesearch").style.display = 'block';
    }
    function hidesearch(id) {
    document.getElementById("search").style.display = 'none';
    document.getElementById("hidesearch").style.display = 'none'; 
    document.getElementById("newsletter").style.display = 'block';
    document.getElementById("showsearch").style.display = 'block'; 
    }
    function showmenu(id) {
    document.getElementById("mob-nav").style.display = 'block';
    document.getElementById("show-mob-menu").style.display = 'none'; 
    document.getElementById("hide-mob-menu").style.display = 'block'; 
    }
    function hidemenu(id) {
    document.getElementById("mob-nav").style.display = 'none';
    document.getElementById("show-mob-menu").style.display = 'block'; 
    document.getElementById("hide-mob-menu").style.display = 'none'; 
    }
    </script>

  </head>
  <body class="{{ isset($activeChannel) ? themeClass($activeChannel) : 'homePage' }}">

    <div class="gridContainer clearfix">
            @yield('header')

                @if(isset($message) and !is_null($message))
                    <div class="alert alert-{{ $messageClass }} alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        {{ $message }}
                    </div>
                @endif

                @yield('content')

            @yield('footer')

        </div>
    </div>
        
        <!--<a class="backToTop" href="#top"><span>Back to top</span></a>-->
    
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>        
        <script>window.jQuery || document.write('<script src="{{ assetPath() }}j/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="{{ assetPath() }}a/j/vendor/bootstrap-datepicker.js"></script>
        <script src="{{ assetPath() }}a/j/vendor/jquery.cookie.js"></script>
        <script src="{{ assetPath() }}a/j/live.min.js"></script>
        <script src="{{ assetPath() }}a/j/preferences.js"></script>
        <script src="{{ assetPath() }}a/j/listings.js"></script>
        <script src="{{ assetPath() }}a/j/cookie.js"></script>
        <script src="{{ assetPath() }}a/j/vendor/owl.carousel.js"></script>

        <script>
            $(document).ready(function() {
                $(".owl-carousel").owlCarousel({
                    autoPlay: false,
                    items : 1,
                    itemsDesktop : [1199,1],
                    itemsDesktopSmall : [979,1],
                    itemsTablet : [480,1],
                    itemsMobile : [479,1],
                    pagination : false,
                    navigation : true,
                    slideSpeed : [200],
                    navigationText  : ['','']
                });
            });
            </script>

        <!--<div id="getTheApp" style="display: none; opacity: 0">
            <a href="{{ baseUrl() }}/download-the-app">
                <span class="phoneIcon"></span>
                Download the Bristol 24-7 App
            </a>
            <a href="#" class="phoneClose"></a>
        </div>-->
    </body>
</html>