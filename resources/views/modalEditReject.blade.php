<main>
    <form action="/edit/reject/{{ $data->id_reject }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12 mb-3">
                <label for="id_reject" class="form-label">Kode Reject</label>
                <input type="text" class="form-control border-primary" id="id_reject" name="id_reject"
                    value="{{ $data->id_reject }}" aria-describedby="emailHelp" required readonly>
            </div>
            <div class="col-12 mb-3">
                <label for="id_reject" class="form-label">Nama Reject</label>
                <input type="text" class="form-control border-primary" id="nama_reject" name="nama_reject"
                    value="{{ $data->nama }}" aria-describedby="emailHelp" required>
            </div>
            <div class="col-3 mb-3">
                <button type="submit" id="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </form>
</main>
