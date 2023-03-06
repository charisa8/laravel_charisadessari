<div class="modal fade" id="show{{ $p->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ $p->nama_pasien }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="nama_pasien" class="form-label">Nama Pasien</label>
                    <input type="text" class="form-control" placeholder="-" name="nama_pasien"
                        value="{{ $p->nama_pasien }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" placeholder="-" name="alamat"
                        value="{{ $p->alamat }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" placeholder="-" name="no_telepon" value="{{ $p->no_telepon }}" disabled>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">Rumah Sakit</label>
                    <input type="text" class="form-control" placeholder="-" name="no_telepon" value="{{ $p->rumah_sakit->nama_rumah_sakit }}" disabled>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger mr-auto" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>