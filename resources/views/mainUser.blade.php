<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistem Pakar</title>
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/performa_melting.css') }}"> --}}
    <link rel="stylesheet"
        type="text/css"href="{{ asset('/css/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/home.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/sb-admin-2.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-6.4.0-web/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/select2.min.css') }}" />

    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/datatables.css') }}" /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('/css/datatables.css') }}">
    <script src="/js/jquery-3.6.3.js"></script>
    <script src="/js/jquerydatatables.js"></script>
    <script src="/css/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="/js/select2.min.js"></script>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> --}}
    {{-- <link rel="stylesheet" href="/user/css/animate.css">
    <link rel="stylesheet" href="/user/css/LineIcons.css">
    <link rel="stylesheet" href="/user/css/owl.carousel.css">
    <link rel="stylesheet" href="/user/css/owl.theme.css">
    <link rel="stylesheet" href="/user/css/magnific-popup.css">
    <link rel="stylesheet" href="/user/css/nivo-lightbox.css">
    <link rel="stylesheet" href="/user/css/main.css">
    <link rel="stylesheet" href="/user/css/responsive.css"> --}}
</head>

<body>
    @include('partial.navUser')
    <div id="main-user">
        @yield('content')
    </div>
</body>

</html>
