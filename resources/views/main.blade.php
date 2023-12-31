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
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/css/sb-admin-2.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('fontawesome-free-6.4.0-web/css/all.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/select2.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('/css/datatables.css') }}" />

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/css/home.css') }}"> --}}
    <script src="/js/jquery-3.6.3.js"></script>
    <script src="/js/jquerydatatables.js"></script>
    <script src="/css/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/js/bootstrap.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script src="/js/select2.min.js"></script>

</head>

<body>
    @include('partial.navbar')
    <div id="layoutSidenav">
        @include('partial.sidebar')
        <div id="layoutSidenav_content" class="">
            <main>
                @yield('content')
            </main>
        </div>

    </div>
</body>

</html>
