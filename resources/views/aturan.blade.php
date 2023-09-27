@extends('main')
@section('content')
    {{-- <div class="main-content">
        <div class="container-fluid">
            <div class="row my-2">
                <div class="col fs-2 fw-semibold my-2z" style="color: black">
                    Relasi Gejala & Kerusakan
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Relasi Gejala & Kerusakan
                        </div>
                        <div class="card-body">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Alternatif</th>
                                        <th scope="col">G1</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Kulit Jeruk</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @else
    @endif
    <div class="col-md-12">
        <div class="card shadow rounded">
            <div class="card-header"> Relasi Gejala dan Kerusakan</div>
            <div class="card-body">
                {{-- <a href="/tambahGejala" type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#tambah">Tambah</a>    --}}
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th scope="col">No</th>
                            <th scope="col">Alternatif</th>
                            <th scope="col">Aksi</th>
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
                                    <td> <button class="btn btn-info" type="button"
                                            onclick="updateRelasi('{{ $reject->id_reject }}')">Update</button></td>
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
                    <button type="button" class="btn-danger rounded btn-close" data-bs-dismiss="modal" aria-label="Close"
                        onclick="closeModal()"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">

                </div>
            </div>

        </div>
    </div>

    <script>
        function updateRelasi(reject) {
            $.get(
                "/partial/modal/relasi" + "/" + reject, {},
                function(data) {
                    $("#ModalrelasiLabel").html("Edit Relasi " + reject); //Untuk kasih judul di modal
                    $("#Modalrelasi").modal("show"); //kalo ID pake "#" kalo class pake "."
                    $('#Modalrelasi .modal-body').load("/partial/modal/relasi" + "/" + reject);
                }
            );
        }
    </script>
@endsection
