<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Pasien</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/pasien" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Pasien" name="nama_pasien" id="nama_pasien">
                        <div class="invalid-feedback" id="w_e">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat">
                        <div class="invalid-feedback" id="np_e">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Telepon" name="no_telepon" id="no_telepon">
                        <div class="invalid-feedback" id="np_e">
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" name="rumah_sakit_id" id="rumah_sakit_id">
                            <option value="">-- Rumah Sakit --</option>
                            @foreach ($rumah_sakit as $rs)
                                <option value="{{ $rs->id }}" {{ old('rumah_sakit_id') == $rs->id ? 'selected' : '' }}> {{ $rs->nama_rumah_sakit }}</option>
                            @endforeach
                        </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mr-auto" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>