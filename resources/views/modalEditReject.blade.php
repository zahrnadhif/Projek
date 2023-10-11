<main>
    <form action="/edit/reject/{{ $data->kode_reject }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 mb-3">
                <label for="kode_reject" class="form-label">Kode Reject</label>
                <input type="text" class="form-control border-primary" id="kode_reject" name="kode_reject"
                    value="{{ $data->kode_reject }}" aria-describedby="emailHelp" required readonly>
            </div>
            <div class="col-12 mb-3">
                <label for="kode_reject" class="form-label">Nama Reject</label>
                <input type="text" class="form-control border-primary" id="nama_reject" name="nama_reject"
                    value="{{ $data->nama }}" aria-describedby="emailHelp" required>
            </div>
            <div class="col-3 mb-3">
                <button type="submit" id="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
</main>
