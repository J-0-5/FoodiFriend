<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>FoodieFriend</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Styles -->
    <style>

        html,
        body {
            background-image: url('{{asset('img/backgroundImg/welcomeBg.jpg')}}');
            background-position: inherit;
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 90vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .size{
            font-size: 7rem !important;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a class="text-white font-weight-bold" href="{{ url('/home') }}">Home</a>
            @else
            <a class="text-white font-weight-bold" href="{{ route('login') }}">@lang('Login')</a>

            @if (Route::has('register'))
            <a class="text-white font-weight-bold" href="{{ route('register') }}">@lang('Register')</a>
            @endif
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title font-weight-bold text-warning size">
                FoodieFriend
            </div>
            <h1 class="text-white font-weight-bold">"Mil sabores en un solo lugar"</h1>
        </div>
    </div>
</body>

</html>
