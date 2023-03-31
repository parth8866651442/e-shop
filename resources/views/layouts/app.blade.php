<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layouts.include.head')
</head>

<body>
    <!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
    @include('layouts.include.header')

    @yield('content')

    @include('layouts.include.footer')
</body>

</html>