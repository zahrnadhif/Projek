@extends('mainUser')
@section( 'content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="main-content">
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
          <div class="col-8 justify-content-center">
            <div class="card">
              {{-- <div class="card-body"> --}}
                <div class="row">
                  <div class="col ">
                      Konsultasi
                  </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <form action="/lhp-final-inspection/simpan" method="post">
                                @csrf
                                  <div class="row mx-2 mt-3">
                                    <div class="col-12 ">
                                      <label for="nrp">NRP</label>
                                      <input class="form-control" type="text" id="nrp" name="nrp" placeholder="Masukan NRP" aria-label="default input example" required>
                                    </div>
                                  </div>
                    
                                  <div class="row mx-2 mt-3">
                                    <div class="col-12">
                                      <label for="nama">Nama</label>
                                      <input class="form-control" type="text" id="nama" name="nama" placeholder="" aria-label="default input example" required>
                                    </div>
                                  </div>
        
                                  <a href="/konsultasi" class="btn btn-success">Simpan</a>   
        
                            </form>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </div>
          </div>
        </div>
    </div>
    
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
          $('#delete').click(function(){
            var rejectid = $(this).attr('data-id');
            var rejectnama = $(this).attr('data-nama');
            swal({
            title: "Yakin ?",
            text: "Apakah kamu ingin menghapus data reject "+rejectnama+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location ="/deleteData/"+rejectid+""
                swal("Data berhasil di hapus", {
                icon: "success",
                });
            } else {
                swal("Data tidak jadi di hapus");
            }
            });
          })
           
    </script>
    <script>
        //message with toastr
        // @if(session()->has('success'))
        
        //     toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        // @elseif(session()->has('error'))

        //     toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        // @endif
        toastr.success('Have fun storming the castle!', 'Miracle Max Says')
    </script>
</div>
@endsection