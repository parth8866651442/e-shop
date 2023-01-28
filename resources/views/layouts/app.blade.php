<!doctype html>
<html class="no-js" lang="">

<head>
    @include('layouts.include.head')
</head>

<body>
    @include('layouts.include.header')

    @yield('content')

    @include('layouts.include.footer')
</body>

</html>