    @extends('mainUser')
    @section('content')

        <body style="background-color: rgb(224, 224, 224)">
            <div class="main-content w-100 h-100">
                <div class="container-fluid mt-3 w-100 h-100">
                    <div class="row justify-content-center">
                        <div class="col-8 text-center">
                            <p>Jawab pertanyaan berikut sesuai dengan reject yang terjadi</p>
                            <div class="card">
                                <form action="/submitKonsultasi/{{ $id->id }}/{{ $urutan }}" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="row mt-2">
                                            <div class="col">
                                                <div class="fs-3 fw-semibold">{{ $gejalaPertama->kode_gejala }} |
                                                    {{ $gejalaPertama->nama }} </div>
                                            </div>
                                        </div>
                                        <input type="text" name="gejala" id=""
                                            value=" {{ $gejalaPertama->kode_gejala }}" hidden>
                                        @if ($bukanGejala == null)
                                        @else
                                            @for ($i = 0; $i < count($bukanGejala); $i++)
                                                <input type="text" name="bukanGejala[]" id=""
                                                    value=" {{ $bukanGejala[$i] }}" hidden>
                                            @endfor
                                        @endif
                                        @if ($benarGejala == null)
                                        @else
                                            @for ($i = 0; $i < count($benarGejala); $i++)
                                                <input type="text" name="benarGejala[]" id=""
                                                    value=" {{ $benarGejala[$i] }}" hidden>
                                            @endfor
                                        @endif
                                        @if ($bukanReject == null)
                                        @else
                                            @for ($i = 0; $i < count($bukanReject); $i++)
                                                <input type="text" name="bukanReject[]" id=""
                                                    value=" {{ $bukanReject[$i] }}" hidden>
                                            @endfor
                                        @endif
                                        <div class="row mt-3">
                                            <div class="col">
                                                <img src="/imageGejala/{{ $gejalaPertama->gambar }}  " alt=""
                                                    style="width:400px; height:400px; ">
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-6 text-end">
                                                <input type="radio" id="html" name="jawaban" value="1">
                                                <label for="html">Ya</label>
                                            </div>
                                            <div class="col-6 text-start">
                                                <input type="radio" id="html" name="jawaban" value="0">
                                                <label for="html">tidak</label>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col">
                                                <button type="submit"
                                                    class="btn btn-success mb-2 justify-content-end">Submit</a>
                                                    {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    @endsection
