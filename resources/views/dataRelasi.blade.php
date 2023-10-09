@extends('mainUser')
@section('content')
    <div class="container-fluid mt-3">
        <div class="row justify-content-end mt-3">
            <div class="col-8 fs-4 fw-semibold">
                Relasi Gejala & Reject
            </div>
            <div class="col-4 d-flex justify-content-end">
                <button type="button" class="btn btn-success mx-1" data-bs-toggle="modal"
                data-bs-target="#showGejala">Data Gejala</button>
                <button type="button" class="btn btn-success " data-bs-toggle="modal"
                    data-bs-target="#showReject">Data Reject</button>
            </div>
        </div>

         <!-- Divider -->
         <hr class="divider">

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card shadow rounded">
                    <div class="card-header">
                        <div class="row d-flex justify-content-between">
                            <div class="col-6">
                                <h5>Relasi Gejala & Reject</h5>
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
                                    <th scope="col">No</th>
                                    <th scope="col">Alternatif</th>
                                    {{-- <th scope="col">Aksi</th> --}}
                                    @foreach ($dataGejala as $gejala)
                                        <th scope="col">{{ $gejala->id_gejala }}</th>
                                    @endforeach
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($dataReject as $reject)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $reject->nama }}</td>
                                            {{-- <td> <button class="btn btn-info" type="button"
                                                onclick="updateRelasi('{{ $reject->id_reject }}')">Update</button></td> --}}
                                            @foreach ($dataGejala as $gejala)
                                                @php
                                                    $dataRelasi = $relasi
                                                        ->where('kode_reject', $reject->id_reject)
                                                        ->where('kode_gejala', $gejala->id_gejala)
                                                        ->first();
                                                @endphp
                                                @if ($dataRelasi->keterangan == 0)
                                                    <td scope="col">-</td>
                                                @else
                                                    <td scope="col">Ya</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="Modalrelasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="ModalrelasiLabel">Tambah Data</h5>
                        <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal"
                            aria-label="Close" onclick="closeModal()"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">

                    </div>
                </div>

            </div>
        </div>

        {{-- Modal Show Gejala --}}
        <div class="modal fade" id="showGejala" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="ModalrelasiLabel"> Data Gejala</h5>
                        <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal"
                            aria-label="Close" onclick="closeModal()"></button>
                    </div>
                    <div class="modal-body">
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
                                        <td class="text-center">{{ $dtgejalas->id_gejala }} </td>
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
                    <div class="modal-footer">

                    </div>
                </div>


            </div>
        </div>

        {{-- Modal Show Reject --}}
        <div class="modal fade" id="showReject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-md ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-5" id="ModalrelasiLabel">Tambah Data</h5>
                        <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal"
                            aria-label="Close" onclick="closeModal()"></button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">No</th>
                                    <th scope="col" class="text-center">ID Reject</th>
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
                                        <td class="text-center">{{ $reject->id_reject }}</td>
                                        <td class="text-center">{{ $reject->nama }}</td>
                                        {{-- <td class="text-center">
                                    </td> --}}
                                        {{-- <td class="text-center">
                                        <button type="button" class="btn btn-primary mx-1"
                                            onclick="editReject('{{ $reject->id_reject }}')">Edit</button>
                                        <button type="button" onclick="deleteRecord('{{ $reject->id_reject }}')"
                                            class="btn btn-danger" id="delete">Hapus</button>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                    </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
