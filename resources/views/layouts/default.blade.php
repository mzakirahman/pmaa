<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.frontsite.meta')
    @vite('resources/css/app.css')
    @stack('before-style')
    @include('includes.frontsite.style')
    @stack('after-style')
    <title>@yield('title') | PPAMB</title>
</head>

<body class="bg-fixed bg-cover mb-20" style="background-image: url(assets/frontsite/images/bg.jpg);">
    <!-- header start -->
    @include('components.frontsite.header')
    <!-- header end -->
    @yield('content')
    @include('components.frontsite.footer')
    <!-- script -->
    @vite('resources/js/app.js')
    @stack('before-script')
    @include('includes.frontsite.script')
    @stack('after-script')
</body>

</html>
