<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="COINRADR is an All in one Tracking & Trading App that provides users a lot of tools to manage their portfolio.">
        <meta name="author" content="Theophilus Aika">

        <title inertia>{{ config('app.name', 'CoinRadr') }}</title>

        {{-- Favicon --}}
        <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

        <!-- Font Awesome-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/fontawesome.css') }}">
        <!-- ico-font-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/icofont.css') }}">
        <!-- Themify icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/themify.css') }}">
        <!-- Flag icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/flag-icon.css') }}">
        <!-- Feather icon-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/feather-icon.css') }}">
        <!-- Plugins css start-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chartist.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/date-picker.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/prism.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vector-map.css') }}">
        <!-- Plugins css Ends-->
        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}">
        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
        <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        <!-- Responsive css-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
        @inertiaHead
    </head>
    <body>
        <!-- Loader starts-->
        <div class="loader-wrapper">
            <div class="theme-loader">  
            <div class="loader-p"></div>
            </div>
        </div>
        <!-- Loader ends-->

        @inertia

        <!-- latest jquery-->
        <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
        <!-- feather icon js-->
        <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
        <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
        <!-- Sidebar jquery-->
        <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
        <script src="{{ asset('assets/js/config.js') }}"></script>
        <!-- Bootstrap js-->
        <script src="{{ asset('assets/js/bootstrap/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}"></script>
        <!-- Plugins JS start-->
        <script src="{{ asset('assets/js/chart/chartist/chartist.js') }}"></script>
        <script src="{{ asset('assets/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
        <script src="{{ asset('assets/js/chart/knob/knob.min.js') }}"></script>
        <script src="{{ asset('assets/js/chart/knob/knob-chart.js') }}"></script>
        <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
        <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
        <script src="{{ asset('assets/js/prism/prism.min.js') }}"></script>
        <script src="{{ asset('assets/js/clipboard/clipboard.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/jquery.counterup.min.js') }}"></script>
        <script src="{{ asset('assets/js/counter/counter-custom.js') }}"></script>
        <script src="{{ asset('assets/js/custom-card/custom-card.js') }}"></script>
        <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('assets/js/vector-map/jquery-jvectormap-2.0.2.min.js') }}"></script>
        <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-world-mill-en.js') }}"></script>
        <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-us-aea-en.js') }}"></script>
        <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-uk-mill-en.js') }}"></script>
        <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-au-mill.js') }}"></script>
        <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-chicago-mill-en.js') }}"></script>
        <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-in-mill.js') }}"></script>
        <script src="{{ asset('assets/js/vector-map/map/jquery-jvectormap-asia-mill.js') }}"></script>
        <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
        <script src="{{ asset('assets/js/notify/index.js') }}"></script>
        <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.js') }}"></script>
        <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.en.js') }}"></script>
        <script src="{{ asset('assets/js/datepicker/date-picker/datepicker.custom.js') }}"></script>
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="{{ asset('assets/js/script.js') }}"></script>

        @env ('local')
            <script src="http://localhost:8080/js/bundle.js"></script>
        @endenv
    </body>
</html>
