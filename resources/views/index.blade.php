@extends('main')
@section( 'content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="main-content">
    <div class="container-fluid mt-3">
        <a href="/tambahData" type="button" class="btn btn-success">Tambah</a>
        <div class="row mt-3">
            @if($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @else
                
            @endif
            <div class="col-md-12">
                <div class="card shadow rounded">
                    <div class="card-body">    
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Reject</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Penyebab</th>
                                <th scope="col">Solusi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no =1;
                                @endphp
                            @foreach($data as $datas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $datas->reject }}</td>
                                <td>{{ $datas->keterangan }}</td>
                                <td>{{ $datas->penyebab }}</td>
                                <td>{{ $datas->solusi }}</td>
                                <td>
                                    <img src="{{ asset('gambarReject/'.$datas->gambar) }}" alt="" style="width:100px; ">
                                </td>
                                <td class="text-center">
                                    <a href="/tampilkanData/{{$datas->id}}" class="btn btn-primary mx-1">Edit</a>
                                    <a href="#" class="btn btn-danger" id="delete" data-id={{ $datas->id }} data-nama={{$datas->reject}} >Hapus</a>
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