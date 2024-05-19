<!-- Modal Edit -->
<div class="modal fade" id="EditWargaModal" tabindex="-1" aria-labelledby=editWargaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id=editWargaModalLabel">Edit Data Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulir Edit data -->
                <form id="updateWargaModal" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="edit-warga-nama" name="nama" required>
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="text" class="form-control" id="edit-warga-nik" name="nik" required>
                                @error('nik')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="edit-warga-tgl_lahir" name="tgl_lahir"
                                    required>
                                @error('tgl_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="edit-warga-tempat_lahir"
                                    name="tempat_lahir" required>
                                @error('tempat_lahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" id="edit-warga-jenis_kelamin" name="jenis_kelamin"
                                    required>
                                    <option value="Laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                @error('jenis_kelamin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select name="agama" id="edit-warga-agama" class="form-control rounded" required>
                                    @foreach ($agama as $agm)
                                        <option value="{{ $agm->id_agama }}">{{ $agm->nama }}</option>
                                    @endforeach
                                </select>
                                @error('agama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="status_perkawinan" class="form-label">Status Perkawinan</label>
                                <select class="form-control" id="edit-warga-status_perkawinan" name="status_perkawinan"
                                    required>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    @error('status_perkawinan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="edit-warga-pekerjaan" name="pekerjaan"
                                    required>
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="edit-warga-password" name="password"
                                    required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Password Confirmation</label>
                                <input type="password" class="form-control" id="edit-warga-password_confirmation"
                                    name="password_confirmation" required>
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="notelp" class="form-label">Nomor Telepon</label>
                                <input type="text" class="form-control" id="edit-warga-notelp" name="notelp"
                                    required>
                                @error('notelp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="keluarga" class="form-label">Nomor Keluarga</label>
                                <select name="keluarga" id="edit-warga-keluarga"
                                    class="form-control select-keluarga rounded" required>
                                    @foreach ($keluarga as $klga)
                                        <option value="{{ $klga->id_keluarga }}">{{ $klga->nokk }} -
                                            {{ $klga->kepala_keluarga->nama }}</option>
                                    @endforeach
                                </select>
                                @error('keluarga')
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
