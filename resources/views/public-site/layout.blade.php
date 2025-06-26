<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('public-site.head')
</head>
<body class="public-site">

    @include('public-site.header')

    <main>
        @yield('content')
    </main>

    @include('public-site.footer')

</body>
</html>
