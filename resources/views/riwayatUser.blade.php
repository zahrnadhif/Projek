@extends('mainUser')
@section('content')
    <div class="container-fluid">
        <div class="row mt-4 mx-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"> Data Riwayat Konsultasi</div>
                    <div class="card-body">
                        <table class="table table-bordered mx-3 mt-2 text-center">
                            <thead>
                                <tr>
                                    <th scope="col">NO</th>
                                    <th scope="col">NRP</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">REJECT</th>
                                    <th scope="col">DETAIL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($data as $key)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $key->nrp }}</td>
                                        <td>{{ $key->users->name }}</td>
                                        @if ($key->null)
                                            <td>Tidak Ditemukan</td>
                                        @else
                                            <td>{{ $key->reject->nama }}</td>
                                        @endif
                                        {{-- <thd>KERUSAKAN</td> --}}
                                        <td><button type="button" onclick="detailReject({{ $key->id }})"
                                                class="btn btn-primary">Detail</button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Detail --}}
    <div class="modal fade" id="modalDetailReject" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="modalDetailRejectLabel">Tambah Data</h5>
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
        function detailReject(id) {
            $.get(
                "/modal/detail/riwayat" + "/" + id, {},
                function(data) {
                    $("#modalDetailRejectLabel").html("Detail Riwayat Konsultasi " ); //Untuk kasih judul di modal
                    $("#modalDetailReject").modal("show"); //kalo ID pake "#" kalo class pake "."
                    $('#modalDetailReject .modal-body').load("/modal/detail/riwayat" + "/" + id);
                }
            );
            // console.log('aneh')
        }
    </script>
@endsection
