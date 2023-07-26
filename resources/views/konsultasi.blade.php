@extends('main')
@section( 'content')

<div class="main-content">
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Daftar Pertanyaan
                    </div>
                    <div class="card-body">
                        <div class="row my-2">
                            <div class="col-1"> No </div>
                            <div class="col-8"> Pertanyaan </div>
                            <div class="col-3"> Jawab</div>
                        </div>

                        <div class="row">
                            <div class="col-1"> 1 </div>
                            <div class="col-7"> Apakah permukaan cat terdapat gelombang yang menyerupai kulit jeruk? </div>
                            <div class="col-4 "> 
                                <div class="row">
                                    <div class="col-6">
                                        <input type="radio" id="html" name="fav_language" value="HTML">
                                        <label for="html">Ya</label>
                                    </div>
                                    <div class="col-6">
                                        <input type="radio" id="html" name="fav_language" value="HTML">
                                        <label for="html">tidak</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col ">
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

@endsection