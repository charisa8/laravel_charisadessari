<div class="modal fade" id="edit{{ $rs->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data {{ $rs->nama_rumah_sakit }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/dashboard/rumah_sakit/{{ $rs->id }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <label for="nama_rumah_sakit" class="form-label">Nama Rumah Sakit</label>
                        <input type="text" class="form-control" placeholder="Nama Rumah Sakit" name="nama_rumah_sakit" id="nama_rumah_sakit{{ $rs->id }}" value="{{ $rs->nama_rumah_sakit }}">
                        <div class="invalid-feedback" id="a{{ $rs->id }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat{{ $rs->id }}" value="{{ $rs->alamat }}">
                        <div class="invalid-feedback" id="a{{ $rs->id }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" placeholder="Email" name="email" id="email{{ $rs->id }}" value="{{ $rs->email }}">
                        <div class="invalid-feedback" id="a{{ $rs->id }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" class="form-control" placeholder="Telepon" name="telepon" id="telepon{{ $rs->id }}" value="{{ $rs->telepon }}">
                        <div class="invalid-feedback" id="a{{ $rs->id }}">
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