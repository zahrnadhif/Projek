<main>
    <div class="col-12">
        <table class="table table-bordered">
            <tr>
                <td class="fw-bold text-start">Nama Pengguna</td>
                <td class="text-start">{{ $dataKonsultasi->nrp }} | {{ $dataKonsultasi->users->name }}</td>
            </tr>
            {{-- <tr>
                <td class="fw-bold text-start">No. HP</td>
                <td class="text-start"></td>
            </tr> --}}

            <tr>
                @if ($gejala != null)
                    <td class="fw-bold text-start">Jawaban Pengguna</td>
                    <td class="text-start">
                        <ul>
                            @foreach ($gejala as $value)
                                <li>{{ $value->kode_gejala }} | {{ $value->nama }}</li>
                            @endforeach
                        </ul>
                    </td>
                @else
                    <td class="fw-bold text-start">Jawaban Pengguna</td>
                    <td class="text-start"> Tidak Ada </td>
                @endif
            </tr>
            <tr>
                @if ($dataKonsultasi->kode_reject == null)
                    <td class="fw-bold text-start">Jenis Reject</td>
                    <td class="text-start">Tidak Ditemukan</td>
                @else
                    <td class="fw-bold text-start">Jenis Reject</td>
                    <td class="text-start">{{ $dataKonsultasi->reject->nama }}</td>
                @endif

            </tr>
            {{-- <tr>
                <td class="fw-bold">Gejala Kerusakan</td>
                <td class="text-start"></td>
            </tr> --}}
            <tr>
                @if ($gejala != null)
                    <td class="fw-bold text-start">Solusi Perbaikan</td>
                    <td class="text-start">
                        <ul>
                            @foreach ($gejala as $value)
                                <li> {{ $value->solusi->keterangan }}</li>
                            @endforeach
                        </ul>

                    </td>
                @else
                    <td class="fw-bold text-start">Solusi Perbaikan</td>
                    <td class="text-start"> Tidak Ada </td>
                @endif
            </tr>
            <tr>
                <td class="fw-bold text-start">Tanggal dan Waktu Konsultasi</td>
                <td>{{ $dataKonsultasi->created_at }}</td>
            </tr>
        </table>
        {{-- <div class="row">
            <a href="/riwayat"><button class="btn btn-info" type="button">Kembali</button></a>
        </div> --}}
    </div>
</main>
