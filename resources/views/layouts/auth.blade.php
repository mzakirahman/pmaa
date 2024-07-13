<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.frontsite.meta')
    @vite('resources/css/app.css')
    <title>@yield('title') | PPAMB</title>
</head>

<body class="bg-fixed bg-cover mb-20" style="background-image: url(assets/frontsite/images/bg.jpg);">
    @yield('content')
    <!-- script -->
    @vite('resources/js/app.js')
</body>

</html>
