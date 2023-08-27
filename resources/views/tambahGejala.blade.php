@extends('main')
@section( 'content')

<div class="main-content">
    <div class="container-fluid">
        <div class="row my-2 justify-content-center">
            <div class="col-8 text-center fs-1 fw-semibold">
                  Data Reject
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <form action="/insertGejala" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="mb-3">
                          <label for="kode" class="form-label">Kode</label>
                          <input type="text" name="kode"class="form-control" id="kode">
                        </div>
                        <div class="mb-3">
                            <label for="nama_gejala" class="form-label">Gejala</label>
                            <input type="text" name="nama_gejala" class="form-control" id="nama_gejala">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
            </div>
       </div>
    </div>
</div>
@endsection