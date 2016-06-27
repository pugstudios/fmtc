<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>

        <!-- CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/jasny-bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
	<link href="http://fonts.googleapis.com/css?family=Inconsolata&amp;v1" rel="stylesheet" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Candal&amp;v1' rel='stylesheet' type='text/css' />

    </head>
    <body>
        @include('shared.nav')

        <div class="container">

            @include('shared.errors')

            @yield('content')

        </div>

        <!-- JS -->
        <script type="text/javascript" src="{{ asset('js/jquery-1.12.3.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/jasny-bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>