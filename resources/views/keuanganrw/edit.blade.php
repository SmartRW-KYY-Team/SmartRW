<!-- Modal Edit -->
<div class="modal fade" id="EditKeuanganModal" tabindex="-1" aria-labelledby="EditKeuanganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditKeuanganModalLabel">Edit Data Keuangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulir Edit data -->
                <form id="updateKeuanganForm" method="POST">
                    @csrf
                    <input type="hidden" id="keuanganrwId" name="id">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="edit-tipe" class="form-label">Tipe</label>
                                <select class="form-control" id="edit-tipe" name="tipe" required>
                                    <option value="Masuk">Masuk</option>
                                    <option value="Keluar">Keluar</option>
                                </select>
                                @error('tipe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="edit-tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="edit-tanggal" name="tanggal" required>
                                @error('tanggal')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="edit-keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="edit-keterangan" name="keterangan"
                                    required>
                                @error('keterangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="edit-jumlah" class="form-label">Jumlah</label>
                                <input type="number" class="form-control" id="edit-jumlah" name="jumlah" required>
                                @error('jumlah')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
