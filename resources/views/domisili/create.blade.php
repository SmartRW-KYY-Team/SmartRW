<!-- Modal Tambah -->
<div class="modal fade" id="tambahDomisiliModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahModalLabel">Tambah Surat Domisili</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulir tambah data -->
                <form action="{{route('domisili.store')}}" method="POST">
                    @csrf
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="pemohon" class="form-label">Pemohon</label>
                            <select name="pemohon" id="pemohon" class="form-control select-rt rounded"
                                required>
                                @foreach ($pemohon as $pmhn)
                                    <option value="{{ $pmhn->id_user }}">{{ $pmhn->nama }}</option>
                                @endforeach
                            </select>
                            @error('pemohon')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="rt" class="form-label">RT</label>
                            <select name="rt" id="rt" class="form-control select-rt rounded"
                                required>
                                @foreach ($rt as $rt_id)
                                    <option value="{{ $rt_id->id_rt }}">{{ $rt_id->nama }}</option>
                                @endforeach
                            </select>
                            @error('rt')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="rw" class="form-label">RW</label>
                            <select name="rw" id="rw" class="form-control select-rw rounded"
                                required>
                                @foreach ($rw as $rw_id)
                                    <option value="{{ $rw_id->id_rw}}">{{ $rw_id->nama }}</option>
                                @endforeach
                            </select>
                            @error('rw')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                            <div class="invalid-feedback" id="keteranganError"></div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>