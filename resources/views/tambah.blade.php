@extends('main')
@section( 'content')

<div class="main-content">
    <div class="container-fluid">
        <div class="row my-2 justify-content-center">
            <div class="col-8 text-center fs-1 fw-semibold">
                Tambah data pegawai
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                  <div class="card-body">
                    <form action="/insertData" method="POST" enctype="multipart/form-data">
                        @csrf 
                        <div class="mb-3">
                          <label for="jenisreject" class="form-label">Jenis Reject</label>
                          <input type="text" name="reject"class="form-control" id="jnsreject">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="keterangan">
                        </div>
                        <div class="mb-3">
                            <label for="penyebab" class="form-label">Penyebabt</label>
                            <input type="text" name="penyebab" class="form-control" id="penyebab">
                          </div>
                        <div class="mb-3">
                              <label for="solusi" class="form-label">Solusi</label>
                              <input type="text" name="solusi" class="form-control" id="solusi">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Upload Gambar</label>
                            <input type="text" name="gambar" class="form-control" id="gambar">
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