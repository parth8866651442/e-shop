<!-- Meta Tag -->
<meta charset="utf-8">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="Shopick – Fashion Store HTML Template is a clean and elegant design – suitable for selling clothing, fashion, high fashion, men fashion, women fashion, accessories, digital, kids, watches, jewelries, shoes, kids, furniture, sports, tools….. It has a fully responsive width adjusts automatically to any screen size or resolution.">
<meta name="viewport" content="width=device-width, initial-scale=1">
@yield('meta')
<title>@yield('title')</title>

<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.ico')}}">
<!-- Place favicon.ico in the root directory -->

<!-- Google Font -->
<link href='https://fonts.googleapis.com/css?family=Roboto:400,500.00,700,300' rel='stylesheet' type='text/css'>

<!-- all css here -->
<!-- bootstrap v5.1.0 css -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
<!-- toastr -->
<link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toatr.css') }}">
<!-- animate css -->
<link rel="stylesheet" href="{{asset('assets/css/animate.min.css')}}">
<!-- jquery-ui.min css -->
<link rel="stylesheet" href="{{asset('assets/css/jquery-ui.min.css')}}">
<!-- meanmenu css -->
<link rel="stylesheet" href="{{asset('assets/css/meanmenu.min.css')}}">
<!-- nivo-slider css -->
<link rel="stylesheet" href="{{asset('assets/lib/css/nivo-slider.css')}}">
<!-- owl.carousel css -->
<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
<!-- flaticon css -->
<link rel="stylesheet" href="{{asset('assets/css/shopick-icon.css')}}">
<!-- pe-icon-7-stroke css -->
<link rel="stylesheet" href="{{asset('assets/css/pe-icon-7-stroke.css')}}">
<!-- lightbox css -->
<link rel="stylesheet" href="{{asset('assets/css/lightbox.min.css')}}">
<!-- style css -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
<!-- responsive css -->
<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
<!-- modernizr css -->
<script src="{{asset('assets/js/vendor/modernizr-3.11.2.min.js')}}"></script>

@stack('styles')