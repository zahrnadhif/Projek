<main>
    <div class="row">
        <div class="col-12 mb-3">
            <label for="id_reject" class="form-label">ID Reject</label>
            <input type="text" class="form-control border-primary" id="id_reject" name="id_reject"
                value="{{ $data->id_reject }}" aria-describedby="emailHelp" required readonly>
        </div>
        <div class="col-12 mb-3">
            <label for="id_reject" class="form-label">Nama Reject</label>
            <input type="text" class="form-control border-primary" id="nama_reject" name="nama_reject"
                value="{{ $data->nama }}" aria-describedby="emailHelp" required readonly>
        </div>
    </div>
</main>
