<!DOCTYPE html>

<html lang="zxx">

<head>
    <!-- meta tag -->
    <meta charset="utf-8">
    <title>Photograper</title>
    <meta name="description" content="">
    <!-- responsive tag -->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- favicon -->
    <link rel="apple-touch-icon" href="apple-touch-icon.html">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/fav.png') }}">
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <!-- animate css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery-ui.min.css') }}">
    <!-- meanmenu css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/meanmenu.min.css') }}">
    <!-- owl.carousel css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
    <!-- magnific popup css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/inc/custom-slider/css/nivo-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/inc/custom-slider/css/preview.css') }}">
    <!-- lightbox css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightbox.min.css') }}">
    <!-- TimeCircles css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/TimeCircles.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <!-- responsive css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
</head>

<body class="home">
    <!--Header area start here-->
    <header>
        <!--Preview area start here-->
        <div class="template-preloader-rapper">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
        <!--End preview here -->
        @yield('top-area')
        @yield('navbar')
        @yield('mobile-area')
    </header>
    @yield('home')
    @yield('gallery')
    @yield('camera')
    @yield('content')
    @yield('photograper')
    @yield('comment')
    <!-- Footer Area Section Start Here -->
    <footer>
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-bottom">
                            <p> &copy; Copyrights group 01 PA2</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area Section End Here -->

    <!-- jquery latest version -->
    <script src="{{ asset('assets/js/vendor/jquery-1.12.0.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- owl.carousel js -->
    <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <!-- meanmenu js -->
    <script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
    <!-- jquery-ui js -->
    <script src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <!-- wow js -->
    <script src="{{ asset('assets/js/wow.min.js') }}"></script>
    <!-- jquery.counterup js -->
    <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
    <!-- jquery light box -->
    <script src="{{ asset('assets/js/lightbox.min.js') }}"></script>
    <!-- isotope.pkgd.min js -->
    <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- imagesloaded.pkgd.min js -->
    <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- jQuery MixedIT Up -->
    <script src="{{ asset('assets/js/jquery.mixitup.min.js') }}"></script>
    <!-- Counter Down js -->
    <script src="{{ asset('assets/js/simplyCountdown.min.js') }}"></script>
    <!-- Nivo slider js -->
    <script src="{{ asset('assets/inc/custom-slider/js/jquery.nivo.slider.js') }}"></script>
    <script src="{{ asset('assets/inc/custom-slider/home.js') }}"></script>
    <!-- jQuery Multistep form -->
    <script src="{{ asset('assets/js/multi_step_form.js') }}"></script>
    <!-- jquery.fancybox.pack js -->
    <script src="{{ asset('assets/inc/fancybox/jquery.fancybox.pack.js') }}"></script>
    <!-- plugins js -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <!-- jquery weave effects -->
    <script src="{{ asset('assets/js/waves.js') }}"></script>
    <!-- TimeCircles js -->
    <script src="{{ asset('assets/js/TimeCircles.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
