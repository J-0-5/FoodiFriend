<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FoodieFriend') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<style>
    body {
            overflow-y: auto;
            overflow-x: hidden;
            /* background-image: url('{{asset('img/backgroundImg/welcomeBg.jpg')}}');
            background-position: inherit;
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 90vh;
            margin: 0; */
        }
</style>

<body>
    <div id="app">
        @include('layouts.navBar')
        <div class="row">
            @include('layouts.leftBar')
            <main class="col py-3">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
