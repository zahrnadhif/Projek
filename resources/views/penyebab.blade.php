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
                    <div class="card-header fs-5 fw-semibold"> Data Penyebab</div>
                    <div class="card-body">
                        <a type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                            data-bs-target="#tambah">Tambah</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Kode Penyebab</th>
                                    <th scope="col" class="text-center">Penyebab</th>
                                    <th scope="col" class="text-center">Solusi</th>
                                    <th scope="col" class="text-center">Gejala</th>
                                    {{-- <th scope="col" class="text-center">Gambar</th> --}}
                                    <th scope="col" class="text-center">Aksi</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $penyebab)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $penyebab->kode_penyebab }}</td>
                                        <td class="text-center">{{ $penyebab->penyebab }}</td>
                                        <td class="text-center">{{ $penyebab->solusi }}</td>
                                        <td class="text-center">{{ $penyebab->gejala->nama }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-primary mx-1"
                                                onclick="editpenyebab('{{ $penyebab->kode_penyebab }}')">Ubah</button>
                                            <button type="button" onclick="deleteRecord('{{ $penyebab->kode_penyebab }}')"
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

    {{-- Modal Tambah Penyebab --}}
    <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-md ">
            <form action="/penyebab-tambah" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="staticBackdropLabel">Tambah Penyebab</h5>
                        <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="kode_penyebab" class="form-label">Kode Penyebab</label>
                                <input type="text" class="form-control border-primary" id="kode_penyebab"
                                    name="kode_penyebab" aria-describedby="emailHelp" required readonly>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="penyebab" class="form-label">Penyebab</label>
                                <input type="text" class="form-control border-primary" id="penyebab"
                                    name="penyebab" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="solusi" class="form-label">Solusi</label>
                                <input type="text" class="form-control border-primary" id="solusi"
                                    name="solusi" aria-describedby="emailHelp" required>
                            </div>
                            <div class="col-12 mb-3">
                                <div>Pilih Gejala</div>
                                <select id="solusi_old" class="form-select form-select-sm w-100"
                                    aria-label="Small select example" style="width: 100%" name="kode_gejala">
                                    <option value=" "> </option>
                                    @foreach ($datagejala as $gejala)
                                        <option value="{{ $gejala->kode_gejala }}">{{ $gejala->nama }}</option>
                                    @endforeach
                                </select>
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
    <div class="modal fade" id="modalEditpenyebab" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="modalEditpenyebabLabel">Tambah penyebab</h5>
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
        let idpenyebab = document.getElementById('kode_penyebab');

        let number = {{ $data->count() }};
        document.getElementById('kode_penyebab').value = 'P' + (number + 1);
        // console.log(number);

        function editpenyebab(penyebab) {
            $.get(
                "/partial/modal/penyebab" + "/" + penyebab, {},
                function(data) {
                    $("#modalEditpenyebabLabel").html("Edit Jenis penyebab " + penyebab); //Untuk kasih judul di modal
                    $("#modalEditpenyebab").modal("show"); //kalo ID pake "#" kalo class pake "."
                    $('#modalEditpenyebab .modal-body').load("/partial/modal/penyebab" + "/" + penyebab);
                }
            );
            console.log('aneh')
        }

        function deleteRecord(kode) {
            console.log(kode);
            if (confirm('Apakah anda yakin akan menghapus ini?')) {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/penyebab/' + kode, {
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
