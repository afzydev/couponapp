<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('pageTitle')</title>
    <!-- meta info -->
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta name="keywords" content="coupons, coupon codes, india coupon codes,latest coupons" />
    <meta name="description" content="The most up to date listing of coupons for Indian retailers. Our editors check coupon codes to ensure validity every day.">
    <meta name="author" content="Afzal">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google fonts -->
    <!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,600' rel='stylesheet' type='text/css'> -->
    <link href='http://fonts.googleapis.com/css?family=Lato:400,700' rel='stylesheet' type='text/css'>
    <!-- Bootstrap styles -->
    
    <link rel="stylesheet" href="{{ asset("assets/front/css/boostrap.css") }}">
    <link rel="stylesheet" href="{{ asset("assets/front/css/boostrap_responsive.css") }}">
    <!-- Font Awesome styles (icons) -->
    <link rel="stylesheet" href="{{ asset("assets/front/css/font_awesome.css") }}">
    <!-- Main Template styles -->
    <link rel="stylesheet" href="{{ asset("assets/front/css/styles.css") }}">

    <link rel="stylesheet" href="{{ asset("assets/front/css/mystyles.css") }}">
    @yield('css')
</head>

<body>


<!-- ///////////MAIN HEADER/////////////////-->
   @include('layouts.mainheader')

    <!-- SEARCH AREA -->
    <div class="search-area">
        <div class="container">
            <div class="row-fluid">
                <div class="span10">
            {{Form::open(array('url' => '/search','id'=>'searchFrom','method'=>'GET'))}}
                    <div class="search-area-division search-area-division-input">
                        <input class="span12" type="text" name="q" placeholder="I am searching for" />
                    </div>
                    
                </div>
                <div class="span2" onclick="send()">
                    <label><i class="icon-search"></i> <div ></div></label>
                </div>
               {{Form::close()}}
               <script type="text/javascript">
                function send()
                {
                  $( "#searchFrom" ).submit();
                }
               </script>
            </div>
        </div>
    </div>
    <!-- END SEARCH AREA -->

    <div class="gap"></div>

    <!-- //////////////////////////////////
//////////////PAGE CONTENT///////////// 
////////////////////////////////////-->



    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>


    <!-- //////////////////////////////////
//////////////END PAGE CONTENT///////// 
////////////////////////////////////-->

    @include('layouts.mainfooter'); 


   <!-- Scripts queries -->
    <script src="{{ asset("assets/front/js/jquery.js") }}"></script>
    <script src="{{ asset("assets/front/js/boostrap.min.js") }}"></script>
    <script src="{{ asset("assets/front/js/nivo_slider.min.js") }}"></script>
    <script src="{{ asset("assets/front/js/countdown.min.js") }}"></script>
    <script src="{{ asset("assets/front/js/flexnav.min.js") }}"></script>
    <script src="{{ asset("assets/front/js/magnific.min.js") }}"></script>
    <script src="{{ asset("assets/front/js/tweet.min.js") }}"></script>
    <script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
    <script src="{{ asset("assets/front/js/gmap3.min.js") }}"></script>
    <script src="{{ asset("assets/front/js/wilto_slider.min.js") }}"></script>
    <script src="{{ asset("assets/front/js/mediaelement.min.js") }}"></script>
    <script src="{{ asset("assets/front/js/fitvids.min.js") }}"></script>
    <script src="{{ asset("assets/front/js/mail.min.js") }}"></script>

    <!-- Custom scripts -->
    <script src="{{ asset("assets/front/js/custom.js") }}"></script>
    @yield('js')

</body>

</html>