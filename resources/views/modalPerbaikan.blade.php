<main>
    <form action="/isi/perbaikan/{{ $dataKonsultasi->id }}" method="post">
        @csrf
        <div class="input-group">
            <span class="input-group-text">Keterangan Perbaikan</span>
            <textarea class="form-control" aria-label="With textarea" id="keterangan_perbaikan" name="keterangan_perbaikan"></textarea>
        </div>
        <div class="mt-2">
            <button class="btn btn-success" type="submit">Simpan</button>
        </div>

    </form>
</main>
