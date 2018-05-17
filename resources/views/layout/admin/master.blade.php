<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @yield('meta')
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::to('images/favicon.png')}}">
    <title>@yield('title')</title>
    <!-- Bootstrap Core CSS -->
    <link href="{{URL::to('assets/admin/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('assets/admin/bower_components/bootstrap-extension/css/bootstrap-extension.css')}}" rel="stylesheet">
    @yield('css')
    <!-- animation CSS -->
    <link href="{{URL::to('assets/admin/css/animate.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{URL::to('assets/admin/css/style.css')}}" rel="stylesheet">
    <!-- App CSS -->
    <link href="{{URL::to('assets/admin/css/app.css')}}" rel="stylesheet">
    <!-- color CSS -->
    <link href="{{URL::to('assets/admin/css/colors/blue.css')}}" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-- jQuery -->
    <script src="{{URL::to('assets/admin/bower_components/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::to('assets/admin/bootstrap/dist/js/tether.min.js')}}"></script>
    <script src="{{URL::to('assets/admin/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::to('assets/admin/bower_components/bootstrap-extension/js/bootstrap-extension.min.js')}}"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="{{URL::to('assets/admin/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>
    <!--slimscroll JavaScript -->
    <script src="{{URL::to('assets/admin/js/jquery.slimscroll.js')}}"></script>
    <!--Wave Effects -->
    <script src="{{URL::to('assets/admin/js/waves.js')}}"></script>
    @yield('dashboard_js')
    <!-- Custom Theme JavaScript -->
    <script src="{{URL::to('assets/admin/js/custom.min.js')}}"></script>
    <!--Style Switcher -->
    <script src="{{URL::to('assets/admin/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
    @yield('js')
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    @yield('content')
</body>

</html>
