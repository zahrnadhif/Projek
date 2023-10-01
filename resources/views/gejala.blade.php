@extends('main')
@section('content')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="main-content">
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
                    <div class="card-header"> Data Gejala/Kriteria</div>
                    <div class="card-body"> 
                        <a href="/tambahGejala" type="button" class="btn btn-success mb-2">Tambah</a>   
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama Gejala</th>
                                <th scope="col">Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no =1;
                                @endphp
                            @foreach ($datagejala as $dtgejalas)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td> {{ $dtgejalas->kode }}</td>
                                <td> {{ $dtgejalas->nama_gejala }}</td>
                                <td class="text-center">
                                    <a href="/tampilGejala/{{$dtgejalas->id}}" class="btn btn-primary mx-1">Edit</a>
                                    <a href="#" class="btn btn-danger" id="delete" data-id={{ $dtgejalas->id }} data-nama={{$dtgejalas->kode}} >Hapus</a>
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
            var gejalaid = $(this).attr('data-id');
            var gejalaket = $(this).attr('data-nama');
            swal({
            title: "Yakin ?",
            text: "Apakah kamu ingin menghapus data gejala "+gejalanama+"",
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
           
    </script> --}}
    {{-- // <script>
        //message with toastr
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
                    <div class="card-header"> Data Gejala/Kriteria</div>
                    <div class="card-body">
                        <a href="/tambahGejala" type="button" class="btn btn-success mb-2" data-bs-toggle="modal"
                            data-bs-target="#tambah">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">ID Gejala</th>
                                    <th scope="col">Nama Gejala</th>
                                    <th scope="col">Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($datagejala as $dtgejalas)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $dtgejalas->id_gejala }} </td>
                                        <td>{{ $dtgejalas->nama }}</td>
                                        <td class="text-center">
                                            <a href="/tampilGejala/{{ $dtgejalas->id }}"
                                                class="btn btn-primary mx-1">Edit</a>
                                            <a href="/hapus/{{ $dtgejalas->id }}" class="btn btn-danger"
                                                id="delete">Hapus</a>
                                        </td>
                                    </tr>
                                    {{-- @php
                                        $no = $no + 1;
                                    @endphp --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Tambah produk --}}
    <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <form action="/insertGejala" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data</h5>
                        <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal"
                            aria-label="Close" onclick="closeModal()"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row" id="IsiModal">
                            <div class="col-12 mb-3">
                                <label for="id_gejala" class="form-label">ID Gejala</label>
                                <input type="text" class="form-control border-primary" id="id_gejala" name="id_gejala"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="col-12 mb-3">
                                <span class="mb-3">Keterangan</span>
                                <textarea class="form-control" aria-label="With textarea" name="keterangan"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                {{-- <label for="id_gejala" class="form-label">ID Gejala</label> --}}
                                <div>Pilih Jenis Solusi</div>
                                <select id="solusi_old" class="form-select form-select-sm w-100"
                                    aria-label="Small select example" name="solusi" style="width: 100%">
                                    <option value=" "> </option>
                                    @foreach ($dataSolusi as $solusi)
                                        <option value="{{ $solusi->id_solusi }}">{{ $solusi->keterangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3" id="ButtonSolusiBaru">
                                <p> <i class="fa-solid fa-circle-exclamation"></i> Jika tidak ada jenis solusi yang sesuai,
                                    maka anda dapat menambah jenis solusi baru dengan menekan tombol " <strong>Tambah Jenis
                                        Solusi</strong> "</p>
                                <button class="btn btn-success" type="button" onclick="tambahSolusi()">Tambah Jenis
                                    Solusi</button>
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

    <script>
        // Untuk Membuat Id Gejala Otomatis
        let idGejala = document.getElementById('id_gejala');

        let number = {{ $datagejala->count() }};
        document.getElementById('id_gejala').value = 'G' + (number + 1);
        // console.log(number);

        //Select 2
        $(document).ready(function() {
            $('#solusi_old').select2({
                dropdownParent: $('#tambah')
            });
        });

        // Tambah Jenis Solusi
        function tambahSolusi() {
            var html = "<div class='col-12 mb-3 kolom'> " +
                "<span class='mb-3'>Keterangan Solusi</span>" +
                "<textarea class='form-control' aria-label='With textarea' name='keterangan_solusi_baru'></textarea>" +
                "</div>";
            var buttonHapus =
                "<button class='btn btn-danger btnHapus' type='button' onclick='closeModal()'>Hapus</button>"
            $('#IsiModal').append(html);
            $('#ButtonSolusiBaru').append(buttonHapus);
        }

        // Hapus barisan pada tag Body
        function closeModal() {
            $('.kolom').remove();
            $('.btnHapus').remove();
            // number -= 1;
        }
    </script>
@endsection
