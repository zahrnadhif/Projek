<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pakar</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/performa_melting.css') }}">
    <link rel="stylesheet" type="text/css"href="{{ asset('/css/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/login.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/sb-admin-2.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('/css/home.css') }}"> --}}
    <script src="/css/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/js/363jquery.min.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
</head>
<body>
    <div id="main">
        @include('partial.navbar')
        {{-- @include('partial.sidebar') --}}
        @yield('content')
        {{-- @include('partial.sidebar') --}}
    </div>
</body>
</html>