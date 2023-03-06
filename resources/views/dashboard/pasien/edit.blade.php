<div class="modal fade" id="edit{{ $p->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data {{ $p->nama_pasien }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/pasien/{{ $p->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama_pasien" class="form-label">Nama Pasien</label>
                        <input type="text" class="form-control" placeholder="Nama Pasien" name="nama_pasien" id="nama_pasien{{ $p->id }}" value="{{ $p->nama_pasien }}">
                        <div class="invalid-feedback" id="a{{ $p->id }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat{{ $p->id }}" value="{{ $p->alamat }}">
                        <div class="invalid-feedback" id="a{{ $p->id }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="no_telepon" class="form-label">No. Telepon</label>
                        <input type="text" class="form-control" placeholder="No. Telepon" name="no_telepon" id="no_telepon{{ $p->id }}" value="{{ $p->no_telepon }}">
                        <div class="invalid-feedback" id="a{{ $p->id }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="rumah_sakit_id" class="form-label">Rumah Sakit</label>
                        <select class="form-select" name="rumah_sakit_id" id="rumah_sakit_id">
                            @foreach ($rumah_sakit as $rs)
                                <option value="{{ $rs->id }}" {{ ($p->rumah_sakit_id) == $rs->id ? 'selected' : '' }}> {{ $rs->nama_rumah_sakit }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback" id="c{{ $p->id }}">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger mr-auto" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>