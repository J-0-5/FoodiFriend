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

<body>
    {{-- <div class="wrapper">
        @include('layouts.navBar')
        @include('layouts.sideBar')
        <main class="py-4">
                    @yield('content')
                </main>
    </div> --}}

    <div id="app">
        @include('layouts.navBar')
        <div class="row">
            @include('layouts.leftBar')
            <main class="col-md-10 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
