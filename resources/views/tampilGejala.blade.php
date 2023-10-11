@extends('main')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row my-2 justify-content-center">
                <div class="col-10 text-center fs-4 fw-semibold">
                    Data Gejala
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-10">

                    <form action="/updateGejala/{{ $datagejala->kode_gejala }}" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body" id="IsiModal">
                                @csrf
                                <div class="mb-3">
                                    <label for="kode_gejala" class="form-label">Id Gejala</label>
                                    <input type="text" name="kode_gejala" class="form-control" id="kode_gejala"
                                        value="{{ $datagejala->kode_gejala }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan_gejala" class="form-label">Keterangan Gejala</label>
                                    <input type="text" name="keterangan_gejala" class="form-control"
                                        id="keterangan_gejala" value="{{ $datagejala->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="solusi" class="form-label">Solusi</label>
                                    <input type="text" name="solusi" class="form-control" id="solusi"
                                        value="{{ $datagejala->solusi->keterangan }}">
                                </div>
                                <div class="mb-3">
                                    <label for="keterangan_gejalagambar_gejala" class="form-label"> <strong>Gambar
                                            Gejala</strong>
                                    </label>
                                    <img width="700" src="/imageGejala/{{ $datagejala->gambar }}" alt=""
                                        srcset="">
                                    <div class="row d-flex justify-content-center">
                                        <div class="col-3"><button class="btn btn-info d-flex justify-content-center"
                                                type="button" onclick="updateGambar()"> Ubah
                                                Gambar</button></div>
                                        <div class="col-2"> <button class="btn btn-info d-flex justify-content-center"
                                                type="button" onclick="updateSolusi()"> Ubah Solusi
                                            </button></div>
                                    </div>

                                </div>
                                <div class="col-12 mb-3" id="ubahGambar">
                                    <label for="gambar_baru" class="form-label">Upload Gambar</label>
                                    <input type="file" class="form-control" id="gambar_baru" name="gambar_baru">
                                </div>
                                <div id="ubahSolusi">
                                    <div class="col-12 mb-3">
                                        {{-- <label for="kode_gejala" class="form-label">ID Gejala</label> --}}
                                        <div>Pilih Jenis Solusi</div>
                                        <select id="solusi_old" class="form-select form-select-sm w-100"
                                            aria-label="Small select example" name="solusi_baru" style="width: 100%">
                                            <option value=" "> </option>
                                            @foreach ($dataSolusi as $solusi)
                                                <option value="{{ $solusi->id_solusi }}">{{ $solusi->keterangan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12 mb-3" id="ButtonSolusiBaru">
                                        <p> <i class="fa-solid fa-circle-exclamation"></i> Jika tidak ada jenis solusi yang
                                            sesuai,
                                            maka anda dapat menambah jenis solusi baru dengan menekan tombol "
                                            <strong>Tambah Jenis
                                                Solusi</strong> "
                                        </p>
                                        <button class="btn btn-success" type="button" onclick="tambahSolusi()">Tambah Jenis
                                            Solusi Baru</button>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-6 mb-3 d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        let gambar = document.getElementById('ubahGambar');
        let solusi = document.getElementById('ubahSolusi');
        gambar.hidden = true;
        solusi.hidden = true;
        var test = 1;

        function updateGambar() {
            gambar.hidden = false;
        }

        function updateSolusi() {
            solusi.hidden = false;
        }

        //Select 2
        $(document).ready(function() {
            $('#solusi_old').select2({
                // dropdownParent: $('#tambah')
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
