<main>
    <form action="/update/relasi/{{ $dataReject->id_reject }}" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
        @csrf
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <th>Kriteria</th>
                    <th>({{ $dataReject->id_reject }})  {{ $dataReject->nama }}</th>
                </thead>
                <tbody>
                    @foreach ($dataRelasi as $relasi)
                    <tr>
                        <td>
                            <strong>
                                {{ $relasi->gejala->id_gejala }}
                            </strong>
                        <br>
                        {{ $relasi->gejala->nama }}
                        </td> 
                        <td>
                            <select class="form-select form-select-sm" aria-label="Small select example" name="relasi[]">
                                @if ($relasi->keterangan == 0 )
                                        <option selected value="0">Tidak</option>
                                        <option value="1">Ya</option>
                                @else
                                        <option selected value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                @endif
                            </select>
                        </td>
                    </tr>
                    @endforeach
                
                </tbody>
            </table>
        </div>
        {{-- <button type="reset" class="btn btn-secondary" id="btn-cancel">Reset</button> --}}
        {{-- <button type="submit" class="btn btn-primary" onclick="redirect()">Lanjutkan</button> --}}
        <button type="submit" id="submit" class="btn btn-success" >Simpan</button>
    </form>
</main>