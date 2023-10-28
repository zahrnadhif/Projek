<main>
    <form action="/edit/penyebab/{{ $data->kode_penyebab }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 mb-3">
                <label for="kode_penyebab" class="form-label">Kode Penyebab</label>
                <input type="text" class="form-control border-primary" id="kode_penyebab" name="kode_penyebab"
                    value="{{ $data->kode_penyebab }}" required readonly>
            </div>
            <div class="col-12 mb-3">
                <label for="penyebab" class="form-label">Penyebab</label>
                <input type="text" class="form-control border-primary" id="penyebab" name="penyebab"
                    value="{{ $data->penyebab }}" aria-describedby="emailHelp" required>
            </div>
            <div class="col-12 mb-3">
                <label for="solusi" class="form-label">Solusi</label>
                <input type="text" class="form-control border-primary" id="solusi" name="solusi"
                    value="{{ $data->solusi }}" aria-describedby="emailHelp" required>
            </div>
            <div class="col-12 mb-3">
                <div>Pilih Gejala</div>
                <select id="solusi_old" class="form-select form-select-sm w-100"
                    aria-label="Small select example" style="width: 100%" name="kode_gejala">
                    <option value="{{ $data->kode_gejala }}">{{ $data->gejala->nama }}</option>
                    @foreach ($datagejala as $gejala)
                        <option value="{{ $gejala->kode_gejala }}">{{ $gejala->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3 mb-3">
                <button type="submit" id="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
</main>
