@extends('mainUser')
@section('content')
    <style>
        /* ==========================================================================
                                                   Hero Area
                                                   ========================================================================== */
        .hero-area {
            position: relative;
        }

        .hero-area .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0px;
            left: 0px;
            background: #5533ff;
            background: linear-gradient(95deg, #5533ff 40%, #25ddf5 100%);
            -webkit-transform: skewY(-12deg);
            transform: skewY(-12deg);
            -webkit-transform-origin: 0;
            transform-origin: 0;
            z-index: -12;
        }

        .hero-area .overlay :nth-child(1) {
            width: 33.33333%;
            width: calc(100% / 2);
            top: 0;
            left: 16.66666%;
            left: calc(calc(100% / 3) / 2);
            right: auto;
            background: #5533ff;
            background: linear-gradient(95deg, #5533ff 40%, #25ddf5 100%);
            height: 200px;
        }

        .hero-area .overlay :nth-child(2) {
            width: 33.33333%;
            width: calc(100% /3);
            bottom: 0;
            background: #5533ff;
            background: linear-gradient(95deg, #5533ff 40%, #25ddf5 100%);
            position: absolute;
            height: 155px;
            left: 3%;
        }

        .hero-area .contents {
            padding: 220px 0;
        }

        .hero-area .contents h2 {
            color: #fff;
            font-size: 38px;
            font-weight: 600;
            line-height: 60px;
            margin-bottom: 20px;
        }

        .hero-area .contents p {
            color: #fff;
            font-size: 18px;
            line-height: 26px;
        }

        .hero-area .contents .btn {
            margin-top: 40px;
            margin-right: 20px;
            text-transform: uppercase;
            width: 180px;
            height: 50px;
            padding: 15px 15px;
        }

        .hero-area .contents .btn-border {
            border: 1px solid #fff;
            color: #3ecf8e !important;
            -webkit-box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
            width: 180px;
            height: 50px;
            padding: 15px 15px;
            background: #fff;
        }

        .hero-area .contents .btn-border:hover {
            background: #fff;
            color: #3ecf8e;
        }

        .hero-area .intro-img {
            padding: 180px 0 0px;
        }

        .hero-area .intro-img img {
            display: block;

            height: auto;
            max-width: 100%;
        }

        .btn-border-filled {
            cursor: pointer;
            background-color: #3ecf8e;
            border: 1px solid #3ecf8e;
            color: #fff;
            box-shadow: 0px 8px 9px 0px rgba(96, 94, 94, 0.17);
            width: 180px;
            height: 50px;
            padding: 15px 15px;
        }

        .btn-border-filled:hover {
            color: #fff;
            background-color: transparent;
            border-color: #fff;
            transform: translateY(-2px);
        }
    </style>
    <!-- Header Section Start -->
    <header id="home" class="hero-area">
        <div class="overlay">
            <span></span>
            <span></span>
        </div>

        <div class="container-fluid">
            <div class="row space-100">
                <div class="col-lg-6 col-md-12 col-xs-12">
                    <div class="contents">
                        <h2 class="head-title">You are Using Free Lite Version</h2>
                        <p>Please, Purchase full version of Slick to get all pages, features and permission to use in
                            commercial projects</p>
                        <div class="header-button ms-4">
                            <a type="button" class="btn btn-border-filled" data-bs-toggle="modal"
                                data-bs-target="#konsultasi">Konsultasi</a>
                            {{-- <a href="https://rebrand.ly/slick-ud" rel="nofollow" target="_blank" class="btn btn-border page-scroll">Learn More</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-xs-12 p-0">
                    <div class="intro-img">
                        <img src="/user/img/cover depan.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>
    {{-- Modal ISI NAMA --}}
    <div class="modal fade" id="konsultasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <form action="/buat/form" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Isi Data Diri</h5>
                        <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nrp" class="form-label">NRP</label>
                                <input type="number" class="form-control border-primary" id="nrp" name="nrp"
                                    aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="nama" class="form-label">NAMA</label>
                                <input type="text" class="form-control border-primary" id="nama" name="nama"
                                    aria-describedby="emailHelp" required readonly>
                            </div>
                            {{-- <div class="col-12 mb-3">
                                <label for="nama" class="form-label">PASSWORD</label>
                                <input type="password" class="form-control border-primary" id="password" name="password"
                                    aria-describedby="emailHelp" required>
                            </div> --}}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary" id="btn-cancel">Reset</button>
                        {{-- <button type="submit" class="btn btn-primary" onclick="redirect()">Lanjutkan</button> --}}
                        <button type="submit" id="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#nrp').keyup(function() {
                $('#result').html('');
                var searchnrp = $('#nrp').val();
                console.log(searchnrp);
                $.ajax({
                    method: "GET",
                    dataType: "json",
                    url: "{{ url('/dtkyrw') }}" + "/" + searchnrp,
                    success: function(data) {
                        // console.log(data[0].name);
                        // $("#nama").html(data[0].name);
                        document.getElementById("nama").value = data[0].name;
                    }
                });
            });
        });
    </script>
@endsection
