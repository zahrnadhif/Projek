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
                        <table class="table table-bordered text-center">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Gejala</th>
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
                                        <td class="text-center">{{ $dtgejalas->kode_gejala }} </td>
                                        <td>{{ $dtgejalas->nama }}</td>
                                        <td class="text-center">
                                            <a href="/tampil/gejala/{{ $dtgejalas->kode_gejala }}"
                                                class="btn btn-primary mx-1">Ubah</a>
                                            <button type="button" onclick="deleteRecord('{{ $dtgejalas->kode_gejala }}')"
                                                class="btn btn-danger" id="delete">Hapus</button>
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
            <form action="/insertGejala" method="POST" onSubmit="document.getElementById('submit').disabled=true;"
                enctype="multipart/form-data">
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
                                <label for="kode_gejala" class="form-label">ID Gejala</label>
                                <input type="text" class="form-control border-primary" id="kode_gejala"
                                    name="kode_gejala" aria-describedby="emailHelp">
                            </div>
                            <div class="col-12 mb-3">
                                <span class="mb-3">Keterangan</span>
                                <textarea class="form-control" aria-label="With textarea" name="keterangan"></textarea>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="gambar" class="form-label">Upload Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar">
                            </div>
                            <div class="col-12 mb-3">
                                {{-- <label for="kode_gejala" class="form-label">ID Gejala</label> --}}
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

    {{-- Modal Edit --}}
    <div class="modal fade" id="modalEditReject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="modalEditRejectLabel">Tambah Data</h5>
                    <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal"
                        aria-label="Close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body" id="tesrt">

                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        // Untuk Membuat Id Gejala Otomatis
        let idGejala = document.getElementById('kode_gejala');

        let number = {{ $datagejala->count() }};
        document.getElementById('kode_gejala').value = 'G' + (number + 1);
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

        // Hapus Gejala
        function deleteRecord(kode) {
            console.log(kode);
            if (confirm('Apakah anda yakin akan menghapus ini?')) {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/gejala/' + kode, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-Token': csrfToken
                    }
                }).then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        console.log('Delete request failed.');
                    }
                });
            } else {

            }
        }

        function editGejala(gejala) {
            $.get(
                "/partial/modal/gejala" + "/" + gejala, {},
                function(data) {
                    $("#modalEditGejalaLabel").html("Edit Jenis Gejala " + gejala); //Untuk kasih judul di modal
                    $("#modalEdiGejala").modal("show"); //kalo ID pake "#" kalo class pake "."
                    $('#modalEditGejala .modal-body').load("/partial/modal/gejala" + "/" + gejala);
                }
            );
            console.log('aneh')
        }
    </script>
@endsection
