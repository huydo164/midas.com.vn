<?php

use App\Library\PHPDev\CGlobal;
use App\Library\PHPDev\FuncLib;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    {!! CGlobal::$extraMeta !!}
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="shortcut icon" href="{{FuncLib::getBaseUrl()}}assets/frontend/img/favicon.ico" type="image/vnd.microsoft.icon">
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('assets/libs/bootstrap/css/bootstrap.min.css')}}" />

	{!! CGlobal::$extraMeta !!}
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="shortcut icon" href="{{FuncLib::getBaseUrl()}}assets/frontend/img/favicon.ico" type="image/vnd.microsoft.icon">
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('assets/libs/bootstrap/css/bootstrap.css')}}" />
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('assets/libs/fontawesome-free-5.15.1-web/css/all.css')}}" />
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('assets/focus/css/reset.css')}}" />
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('assets/frontend/css/site.css')}}" />
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('assets/frontend/css/media.css')}}" />
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('assets/frontend/css/animate.css')}}" />
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('assets/frontend/css/owl.carousel.min.css')}}" />
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('assets/frontend/css/owl.theme.default.min.css')}}" />
    <link media="all" type="text/css" rel="stylesheet" href="{{URL::asset('assets/frontend/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{URL::asset('assets/frontend/js/site.js')}}"></script>
    <script src="{{URL::asset('assets/frontend/js/cart.js')}}"></script>
    <script src="{{URL::asset('assets/focus/js/jquery.2.1.1.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('assets/libs/number/autoNumeric.js')}}"></script>

    <script src="{{URL::asset('assets/frontend/js/owl.carousel.js')}}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    {!! CGlobal::$extraHeaderCSS !!}
    {!! CGlobal::$extraHeaderJS !!}
    <script type="text/javascript">
        var BASE_URL = '{{FuncLib::getBaseUrl()}}';
    </script>
    @if(CGlobal::is_dev == 0)
    @endif
</head>

<body>
    <div id="wrapper">
        @yield('header')
        @yield('content')
        @yield('footer')
    </div>
    {!! CGlobal::$extraFooterCSS !!}
    {!! CGlobal::$extraFooterJS !!}
</body>

</html>