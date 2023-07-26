@extends('main')
@section( 'content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="main-content">
    <div class="container-fluid mt-3">

        <div class="row mt-3">
            @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @else       
            @endif
            <div class="col-md-12">
                <div class="card shadow rounded">
                    <div class="card-header"> Data Gejala/Kriteria</div>
                    <div class="card-body"> 
                        <a href="/gejala/tambahGejala" type="button" class="btn btn-success mb-2">Tambah</a>   
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama Gejala</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no =1;
                                @endphp
                            @foreach($datagejala as $dtgejala)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $dtgejala->kode }}</td>
                                <td>{{ $dtgejala->nama_gejala }}</td>
                                <td class="text-center">
                                    <a href="/tampilGejala/{{$dtgejala->id}}" class="btn btn-primary mx-1">Edit</a>
                                    <a href="#" class="btn btn-danger" id="delete" data-id={{ $dtgejala->id }} data-nama={{$dtgejala->nama_gejala}} >Hapus</a>
                                </td>
                            </tr>
                            @endforeach                           
                            </tbody>
                          </table>  
                    </div>
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
            var gejalaid = $(this).attr('data-id');
            var gejalaket = $(this).attr('data-nama');
            swal({
            title: "Yakin ?",
            text: "Apakah kamu ingin menghapus data reject "+gejalanama+"",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                window.location ="/deleteData/"+gejalaid+""
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