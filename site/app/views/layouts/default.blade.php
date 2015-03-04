<!DOCTYPE html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="">
<!--<![endif]-->
<head>
    <title>Bristol 24/7 <?php echo isset($pageTitle) ? '- '.$pageTitle : '' ?></title>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    
    <!-- CSS -->
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ assetPath() }}a/c/boilerplate.css">
    <link rel="stylesheet" href="{{ assetPath() }}a/c/final.css">
    <link rel="stylesheet" href="{{ assetPath() }}a/c/owl.carousel.css">
        
    <!-- FONTS -->

    <link href='http://fonts.googleapis.com/css?family=Alegreya' rel='stylesheet' type='text/css'>

    <!-- JS -->

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
    </body>
</html>