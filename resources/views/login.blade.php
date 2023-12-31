<link rel="stylesheet"
    type="text/css"href="{{ asset('/css/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/css/bootstrap.min.css') }}">
<script src="/css/bootstrap-5.2.2-dist/bootstrap-5.2.2-dist/js/bootstrap.js"></script>

<style>
    body {
        background-image: url('/img/backgroundCasting.jpg');
        background-size: cover;
    }
    .login {
        color: #000;
        text-transform: uppercase;
        letter-spacing: 2px;
        display: block;
        font-weight: bold;
        font-size: x-large;
    }

    .card {
        /* display: flex; */
        justify-content: center;
        align-items: center;
        min-height: 350px;
        width: 300px;
        flex-direction: column;
        gap: 35px;
        background: #e3e3e3;
        box-shadow: 16px 16px 32px #c8c8c8,
            -16px -16px 32px #fefefe;
        border-radius: 8px;
    }

    .inputBox {
        position: relative;
        width: 250px;
    }

    .inputBox input {
        width: 100%;
        padding: 10px;
        outline: none;
        border: none;
        color: #000;
        font-size: 1em;
        background: transparent;
        border-left: 2px solid #000;
        border-bottom: 2px solid #000;
        transition: 0.1s;
        border-bottom-left-radius: 8px;
    }

    .inputBox span {
        margin-top: 5px;
        position: absolute;
        left: 0;
        transform: translateY(-4px);
        margin-left: 10px;
        padding: 10px;
        pointer-events: none;
        font-size: 12px;
        color: #000;
        text-transform: uppercase;
        transition: 0.5s;
        letter-spacing: 3px;
        border-radius: 8px;
    }

    .inputBox input:valid~span,
    .inputBox input:focus~span {
        transform: translateX(113px) translateY(-15px);
        font-size: 0.8em;
        padding: 5px 10px;
        background: #000;
        letter-spacing: 0.2em;
        color: #fff;
        border: 2px;
    }

    .inputBox input:valid,
    .inputBox input:focus {
        border: 2px solid #000;
        border-radius: 8px;
    }

    .enter {
        height: 45px;
        width: 100px;
        border-radius: 5px;
        border: 2px solid #000;
        cursor: pointer;
        background-color: transparent;
        transition: 0.5s;
        text-transform: uppercase;
        font-size: 10px;
        letter-spacing: 2px;
        margin-bottom: 1em;
    }

    .enter:hover {
        background-color: rgb(0, 0, 0);
        color: white;
    }
</style>
@error('error')
    <span>
        <strong>{{ $message }}</strong>
    </span>
@enderror

@extends('mainUser')
@section('content')
<div class="container">
    <div class="row d-flex justify-content-center align-items-center h-75 mt-5" >
        <div class="col d-flex justify-content-center">
            <form action="/login/masuk" method="post">
                @csrf
                <div class="card">
                    <a class="login">Log in</a>
                    <div class="inputBox">
                        <input type="number" name="nrp" required="required">
                        <span class="user">NRP</span>
                    </div>

                    <div class="inputBox">
                        <input type="password" name="password" required="required">
                        <span>Password</span>
                    </div>

                    <button class="enter">
                        <a class="nav-link  ms-2" href="{{ url('/dashboard') }}">Login</a>
                    </button>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
