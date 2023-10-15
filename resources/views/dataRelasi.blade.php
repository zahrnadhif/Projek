@extends('mainUser')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row justify-content-end mt-3">
            <div class="col-8 fs-4 fw-semibold">
                Data Gejala & Reject
            </div>
            <div class="col-4 d-flex justify-content-end">
                <button type="button" class="btn btn-success mx-1" onclick="showGejala()">Data Gejala</button>
                <button type="button" class="btn btn-success " onclick="showReject()">Data Reject</button>
            </div>
        </div>

        <!-- Divider -->
        <hr class="divider">

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card shadow rounded" id="tabelGejala">
                    <div class="card-header">
                        <div class="row d-flex justify-content-between">
                            <div class="col-6">
                                <h5>Tabel Gejala </h5>
                            </div>
                            {{-- <div class="col-3">
                                <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal"
                                    data-bs-target="#showGejala">Data Gejala</button>
                                <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal"
                                    data-bs-target="#showReject">Data Reject</button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        {{-- <a href="/tambahGejala" type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</a>    --}}
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th>No</th>
                                    <th>Kode Gejala</th>
                                    <th>Nama Gejala</th>
                                    <th>Solusi</th>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($dataGejala as $dtgejalas)
                                        <tr>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td class="text-center">{{ $dtgejalas->kode_gejala }} </td>
                                            <td>{{ $dtgejalas->nama }}</td>

                                            <td>{{ $dtgejalas->solusi->keterangan }}</td>


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
                <div class="card shadow rounded" id="tabelReject">
                    <div class="card-header">
                        <div class="row d-flex justify-content-between">
                            <div class="col-6">
                                <h5>Tabel Reject </h5>
                            </div>
                            {{-- <div class="col-3">
                                            <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal"
                                                data-bs-target="#showGejala">Data Gejala</button>
                                            <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal"
                                                data-bs-target="#showReject">Data Reject</button>
                                        </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">Kode Reject</th>
                                    <th scope="col" class="text-center">Keterangan</th>
                                    {{-- <th scope="col" class="text-center">Gambar</th> --}}
                                    {{-- <th scope="col" class="text-center">Aksi</th> --}}
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($dataReject as $reject)
                                    <tr>
                                        <td class="text-center">{{ $no++ }}</td>
                                        <td class="text-center">{{ $reject->kode_reject }}</td>
                                        <td class="text-center">{{ $reject->nama }}</td>
                                        {{-- <td class="text-center">
                                        </td> --}}
                                        {{-- <td class="text-center">
                                            <button type="button" class="btn btn-primary mx-1"
                                                onclick="editReject('{{ $reject->kode_reject }}')">Edit</button>
                                            <button type="button" onclick="deleteRecord('{{ $reject->kode_reject }}')"
                                                class="btn btn-danger" id="delete">Hapus</button>
                                            <meta name="csrf-token" content="{{ csrf_token() }}">
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script>
        let tabelA = document.getElementById('tabelGejala');
        let tabelB = document.getElementById('tabelReject');
        tabelA.hidden = false;
        tabelB.hidden = true;

        function showReject() {
            tabelA.hidden = true;
            tabelB.hidden = false;
        }

        function showGejala() {
            tabelA.hidden = false;
            tabelB.hidden = true;
        }
    </script>
@endsection
