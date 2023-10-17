@extends('main')
@section('content')
   
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
                    <div class="card-header fs-5 fw-semibold"> Data Reject</div>
                    <div class="card-body">
                        <a type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                            data-bs-target="#tambah">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Kode Reject</th>
                                    <th scope="col" class="text-center">Keterangan</th>
                                    {{-- <th scope="col" class="text-center">Gambar</th> --}}
                                    <th scope="col" class="text-center">Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $reject)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $reject->kode_reject }}</td>
                                        <td class="text-center">{{ $reject->nama }}</td>
                                        {{-- <td class="text-center">
                                        </td> --}}
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary mx-1"
                                                onclick="editReject('{{ $reject->kode_reject }}')">Ubah</button>
                                            <button type="button" onclick="deleteRecord('{{ $reject->kode_reject }}')"
                                                class="btn btn-danger" id="delete">Hapus</button>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
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

    {{-- Modal Tambah REJECT --}}
    <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <form action="/insertData" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Tambah reject</h5>
                        <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="kode_reject" class="form-label">Kode Reject</label>
                                <input type="text" class="form-control border-primary" id="kode_reject"
                                    name="kode_reject" aria-describedby="emailHelp" required readonly>
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
                    <h5 class="modal-title fs-5" id="modalEditRejectLabel">Tambah Reject</h5>
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
        let idReject = document.getElementById('kode_reject');

        let number = {{ $data->count() }};
        document.getElementById('kode_reject').value = 'R' + (number + 1);
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

        function deleteRecord(kode) {
            console.log(kode);
            if (confirm('Apakah anda yakin akan menghapus ini?')) {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/reject/' + kode, {
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
    </script>
@endsection
