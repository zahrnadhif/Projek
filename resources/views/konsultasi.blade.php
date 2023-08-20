@extends('mainUser')
@section( 'content')

<body style="background-color: rgb(224, 224, 224)">
<div class="main-content w-100 h-100" >
    <div class="container-fluid mt-3 w-100 h-100">
        <div class="row justify-content-center">
            <div class="col-8 text-center">
                <p>Jawab pertanyaan berikut sesuai dengan reject yang terjadi</p>
                <div class="card">
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col">
                                <div class="fs-3 fw-semibold"> Apakah permukaan cat terdapat gelombang yang menyerupai kulit jeruk? </div>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <img src="{{ asset('gambarReject/1KJ.jpeg') }}" alt="" style="width:400px; height:400px; ">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-6 text-end">
                                <input type="radio" id="html" name="fav_language" value="HTML">
                                <label for="html">Ya</label>
                            </div>
                            <div class="col-6 text-start">
                                <input type="radio" id="html" name="fav_language" value="HTML">
                                <label for="html">tidak</label>
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col">
                                <a href="/detail" type="button" class="btn btn-success mb-2 justify-content-end">Submit</a>   
                                {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection