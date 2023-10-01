@extends('main')
@section('content')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}

    {{-- <div class="main-content">
    <div class="container-fluid mt-3">
        <div class="row mt-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @else       
            @endif
            <div class="col-md-12">
                <div class="card shadow rounded">
                    <div class="card-header"> Data Reject</div>
                    <div class="card-body"> 
                        <a href="/tambahData" type="button" class="btn btn-success mb-2">Tambah</a>   
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
                            @foreach ($data as $datas)
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
   
    </div> --}}

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
    {{-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <script> --}}
    {{-- //message with toastr
        // @if (session()->has('success'))
        
        //     toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        // @elseif(session()->has('error'))

        //     toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        // @endif
        toastr.success('Have fun storming the castle!', 'Miracle Max Says')
    </script> --}}
    {{-- </div> --}}

    <div class="container-fluid mt-3">

        <div class="row mt-3">
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @else
            @endif
            <div class="col-md-12">
                <div class="card shadow rounded">
                    <div class="card-header"> Data Jenis Reject</div>
                    <div class="card-body">
                        <a type="button" class="btn btn-success mb-2" data-bs-toggle="modal"
                            data-bs-target="#tambah">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">ID Reject</th>
                                    <th scope="col" class="text-center">Keterangan</th>
                                    <th scope="col" class="text-center">Gambar</th>
                                    <th scope="col" class="text-center">Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $reject)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $reject->id_reject }}</td>
                                        <td class="text-center">{{ $reject->nama }}</td>
                                        <td class="text-center">
                                        </td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary mx-1"
                                                onclick="editReject('{{ $reject->id_reject }}')">Edit</button>
                                            <a href="delete/{{ $reject->id }}" class="btn btn-danger"
                                                id="delete">Hapus</a>
                                        </td>
                                    </tr>
                                    @php
                                        $no = $no + 1;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah REJECT --}}
    <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <form action="/insertData" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h5>
                        <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="id_reject" class="form-label">ID Reject</label>
                                <input type="text" class="form-control border-primary" id="id_reject" name="id_reject"
                                    aria-describedby="emailHelp" required readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="nama_reject" class="form-label">Nama Reject</label>
                                <input type="text" class="form-control border-primary" id="nama_reject"
                                    name="nama_reject" aria-describedby="emailHelp" required>
                            </div>
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

    {{-- Modal Edit --}}
    <div class="modal fade" id="modalEditReject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="modalEditRejectLabel">Tambah Data</h5>
                    <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="closeModal()"></button>
                </div>
                <div class="modal-body" id="tesrt">

                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>
    <script>
        let idReject = document.getElementById('id_reject');

        let number = {{ $data->count() }};
        document.getElementById('id_reject').value = 'R' + (number + 1);
        // console.log(number);

        function editReject(reject) {
            $.get(
                "/partial/modal/reject" + "/" + reject, {},
                function(data) {
                    $("#modalEditRejectLabel").html("Edit Jenis Reject " + reject); //Untuk kasih judul di modal
                    $("#modalEditReject").modal("show"); //kalo ID pake "#" kalo class pake "."
                    $('#modalEditReject .modal-body').load("/partial/modal/reject" + "/" + reject);
                }
            );
            console.log('aneh')
        }
    </script>
@endsection
