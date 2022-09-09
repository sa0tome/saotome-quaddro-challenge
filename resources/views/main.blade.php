<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>@yield('title')</title>
        @vite(['resources/js/app.js'])
    </head>
    <body>
        <div class="container-md">
            @yield('content')
        </div>
    </body>
</html>