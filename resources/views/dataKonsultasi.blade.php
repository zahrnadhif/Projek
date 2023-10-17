@extends('main')
@section('content')
    <div class="container-fluid">

        <div class="row justify-content-end mt-3">
            <div class="col-8 fs-4 fw-semibold">
                Data Riwayat Konsultasi
            </div>
            <div class="col-4 d-flex justify-content-end">
                <div class="col-3 mt-2"> 
                    <button id="btnAll" type="button" class="btn btn-primary" onclick="aktif()">Data
                    Hari Ini</button>
                    <button id="btnToday" type="button" class="btn btn-primary" onclick="off()">Kembali</button>
                </div>
            </div>
        </div>

        <!-- Divider -->
        <hr class="divider">


        <div class="row  mx-3 d-flex justify-content-center">
            <div class="col-12">
                {{-- <div class="row d-flex justify-content-between mt-2">
                    <div class="col-4">
                        <h4>Data Riwayat Konsultasi</h4>
                    </div>

                    <div class="col-3 mt-2"> <button id="btnAll" type="button" class="btn btn-primary" onclick="aktif()">Data
                            Hari
                            Ini</button>
                        <button id="btnToday" type="button" class="btn btn-primary" onclick="off()">Kembali</button>
                    </div>
                </div> --}}
            </div>

            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header fs-5 fw-semibold"> Riwayat Konsultasi</div>
                        <div class="card-body">
                            <table class="table table-bordered mx-3 mt-2" id="dataAll">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">NRP</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">REJECT</th>
                                        <th scope="col">AKSI</th>
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
                                            @if ($key->kode_reject == null)
                                                {{-- jika reject tidak ditemukan --}}
                                                <td>Tidak Ditemukan</td>
                                            @else
                                                 {{-- jika reject ditemukan --}}
                                                <td>{{ $key->reject->nama }}</td>
                                            @endif
                                            {{-- <thd>KERUSAKAN</td> --}}
                                            <td><button type="button" onclick="detailReject({{ $key->id }})"
                                                    class="btn btn-primary">Detail</button>
                                                @if (Auth::user()->isEngineering())
                                                    <button type="button" onclick="deleteRecord('{{ $key->id }}')"
                                                        class="btn btn-danger" id="delete">Hapus</button>
                                                @elseif(Auth::user()->isForeman())
                                                    {{-- jika reject tidak ditemukan maka akan muncul button perbaikan --}}
                                                    @if ($key->kode_reject == null)
                                                        <button type="button" onclick="detailPerbaikan({{ $key->id }})"
                                                            class="btn btn-primary">Perbaikan</button>
                                                    @else
                                                    {{-- jika reject  ditemukan maka tidak akan muncul button perbaikan --}}
                                                    @endif
                                                @endif
                                                
                
                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <table class="table table-bordered mx-3 mt-2" id="dataToday">
                                <thead>
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">NRP</th>
                                        <th scope="col">NAMA</th>
                                        <th scope="col">REJECT</th>
                                        <th scope="col">AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($dataToday as $key)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $key->nrp }}</td>
                                            <td>{{ $key->users->name }}</td>
                                            @if ($key->kode_reject == null)
                                                <td>Tidak Ditemukan</td>
                                            @else
                                                <td>{{ $key->reject->nama }}</td>
                                            @endif
                                            {{-- <thd>KERUSAKAN</td> --}}
                                            {{-- <td><button type="button" onclick="detailReject({{ $key->id }})"
                                                    class="btn btn-primary">Detail</button>
                                                @if (Auth::user()->isEngineering())
                                                    <button type="button" onclick="deleteRecord('{{ $key->id }}')"
                                                        class="btn btn-danger" id="delete">Hapus</button>
                                                @elseif(Auth::user()->isForeman())
                                                    <button type="button" onclick="detailPerbaikan({{ $key->id }})"
                                                        class="btn btn-primary">Perbaikan</button>
                                                @endif
                                            </td> --}}
                                            <td><button type="button" onclick="detailReject({{ $key->id }})"
                                                class="btn btn-primary">Detail</button>
                                            @if (Auth::user()->isEngineering())
                                                <button type="button" onclick="deleteRecord('{{ $key->id }}')"
                                                    class="btn btn-danger" id="delete">Hapus</button>
                                            @elseif(Auth::user()->isForeman())
                                                {{-- jika reject tidak ditemukan maka akan muncul button perbaikan --}}
                                                @if ($key->kode_reject == null)
                                                    <button type="button" onclick="detailPerbaikan({{ $key->id }})"
                                                        class="btn btn-primary">Perbaikan</button>
                                                @else
                                                {{-- jika reject  ditemukan maka tidak akan muncul button perbaikan --}}
                                                @endif
                                            @endif  
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

    {{-- Modal Perbaikan --}}
    <div class="modal fade" id="modalDetailPerbaikan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg ">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-5" id="modalDetailPerbaikanLabel">Tambah Data</h5>
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        // Hapus Riwayat konsultasi
        function deleteRecord(kode) {
            console.log(kode);
            if (confirm('Apakah anda yakin akan menghapus ini?')) {
                var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                fetch('/riwayat/konsultasi/hapus' + '/' + kode, {
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

        function detailPerbaikan(id) {
            $.get(
                "/modal/detail/perbaikan" + "/" + id, {},
                function(data) {
                    $("#modalDetailPerbaikanLabel").html("Detail Perbaikan "); //Untuk kasih judul di modal
                    $("#modalDetailPerbaikan").modal("show"); //kalo ID pake "#" kalo class pake "."
                    $('#modalDetailPerbaikan .modal-body').load("/modal/detail/perbaikan" + "/" + id);
                }
            );
            // console.log('aneh')
        }

        let all = document.getElementById('dataAll');
        let today = document.getElementById('dataToday');
        let buttonAll = document.getElementById('btnAll');
        let butonToday = document.getElementById('btnToday');
        all.hidden = false;
        today.hidden = true;
        buttonAll.hidden = false;
        butonToday.hidden = true;

        function aktif() {
            all.hidden = true;
            today.hidden = false;
            buttonAll.hidden = true;
            butonToday.hidden = false;
        }

        function off() {
            all.hidden = false;
            today.hidden = true;
            buttonAll.hidden = false;
            butonToday.hidden = true;
        }
        
    </script>
@endsection
