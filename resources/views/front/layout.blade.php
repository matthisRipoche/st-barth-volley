<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('front.head')
</head>
<body class="front">

    @include('front.header')

    <main>
        @yield('content')
    </main>

    @include('front.footer')

</body>
</html>
