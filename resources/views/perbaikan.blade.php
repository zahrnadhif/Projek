@extends('main')
@section('content')
    <div class="container-fluid ">
        <div class="row m-3">
            <h4 class="m-2">Data Riwayat Perbaikan</h4>
            <table class="table table-bordered" id="tabelKeseluruhan">
                <thead>
                    <th>No</th>
                    <th>Jenis Reject</th>
                    <th>Keterangan Perbaikan</th>
                    <th>Tanggal dan Waktu</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $key)
                        {{-- @dd($key->konsultasi) --}}
                        <tr>
                            <td>{{ $no++ }}</td>
                            @if ($key->konsultasi->kode_reject == null)
                                <td>Tidak Ditemukan</td>
                            @else
                                <td>{{ $key->konsultasi->reject->nama }}</td>
                            @endif
                            {{-- <td>{{ $key->konsultasi->reject }}</td> --}}
                            <td>{{ $key->keterangan }}</td>
                            <td>{{ $key->created_at }}</td>
                            <td>
                                <button type="button" onclick="detailReject({{ $key->kode_konsultasi }})"
                                    class="btn btn-primary">Detail</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

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
                    $("#modalDetailRejectLabel").html("Detail Riwayat Konsultasi "); //Untuk kasih judul di modal
                    $("#modalDetailReject").modal("show"); //kalo ID pake "#" kalo class pake "."
                    $('#modalDetailReject .modal-body').load("/modal/detail/riwayat" + "/" + id);
                }
            );
            // console.log('aneh')
        }
    </script>
@endsection
