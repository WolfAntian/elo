<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="height: 100%">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ELO') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="text-center h-100" style="height: 100%">
<main class="welcome py-4 h-100">
    <header>
        <nav class="navbar justify-content-between container">
            <a class="navbar-brand" style="color: #F5F5F5" >{{ config('app.name', 'ELO') }}</a>
            <ul class="navbar-nav ml-auto form-inline">
                <li><a href="{{ route('register') }}" class="btn mr-2">Register</a></li>
                <li><a href="{{ route('login') }}" class="btn mr-2">Sign In!</a></li>
            </ul>
        </nav>
    </header>

    <div class="h-100 row align-items-center">
        <div class="main col col-sm-6 offset-sm-3">
            <h1>{{ config('app.name', 'ELO') }}</h1>
            <p>A Simple Solution To Game Score Tracking.</p>
            <hr>
            <div style="display: inline">
                <h2><i class="fas fa-fw fa-2x fa-gamepad"></i></h2>
                <h2><i class="fas fa-fw fa-2x fa-chess-pawn"></i></h2>
                <h2><i class="fas fa-fw fa-2x fa-trophy"></i></h2>
                <h2><i class="fas fa-fw fa-2x fa-bowling-ball"></i></h2>
                <h2><i class="fas fa-fw fa-2x fa-crosshairs"></i></h2>
            </div>
        </div>
    </div>
</main>
</body>
</html>
