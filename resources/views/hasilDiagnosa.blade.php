@extends('mainUser')
@section('content')

    <body style="background-color: rgb(224, 224, 224)">
        <div class="main-content w-100 h-100">
            <div class="container-fluid mt-3 w-100 h-100">
                <div class="row justify-content-center">
                    <div class="col-8 text-center">
                        {{-- <p>Jawab pertanyaan berikut sesuai dengan reject yang terjadi</p> --}}
                        <div class="card">
                            {{-- <form action="/submitKonsultasi/{{ $id->id }}/{{ $urutan }}" method="post">
                                @csrf --}}
                            <div class="card-body">
                                <div class="row mt-2">
                                    <div class="col">
                                        <div class="fs-3 fw-semibold py-3">Hasil Konsultasi </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="fw-bold text-start">Nama Pengguna</td>
                                            <td class="text-start">{{ $id->nrp }} | {{ $id->users->name }}</td>
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
                                            @if ($jenisReject == null)
                                                <td class="fw-bold text-start">Jenis Reject</td>
                                                <td class="text-start">Tidak Ditemukan</td>
                                            @else
                                                <td class="fw-bold text-start">Jenis Reject</td>
                                                <td class="text-start">{{ $jenisReject->nama }}</td>
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
                                    </table>
                                    <div class="row">
                                        <a href="/"><button class="btn btn-info" type="button">Kembali</button></a>
                                    </div>
                                </div>
                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection
