@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Edit Warga</h4>
        </div>
        <div class="card-body">
            <form action="{{route('warga.update', ['id' => $id_warga])}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $warga->nama) }}" id="edit-warga-nama" name="nama" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" value="{{ old('nik', $warga->nik) }}" id="edit-warga-nik" name="nik" required>
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
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir', $warga->tgl_lahir) }}" id="edit-warga-tgl_lahir" name="tgl_lahir"
                                required>
                            @error('tgl_lahir')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" value="{{ old('tempat_lahir', $warga->tempat_lahir) }}" id="edit-warga-tempat_lahir"
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
                            <select class="form-control @error('jenis_kelamin') is-invalid @enderror" value="{{ old('jenis_kelamin', $warga->jenis_kelamin) }}" id="edit-warga-jenis_kelamin" name="jenis_kelamin"
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
                            <select name="agama" id="edit-warga-agama" class="form-control rounded @error('agama') is-invalid @enderror" required>
                                @foreach ($agama as $agm)
                                    <option value="{{ $agm->id_agama }}"
                                        {{ $warga->agama_id == $agm->id_agama ? 'selected' : old('agama') }}>
                                        {{ $agm->nama }}
                                    </option>
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
                            <select class="form-control @error('status_perkawinan') is-invalid @enderror" value="{{ old('status_perkawinan') }}" id="edit-warga-status_perkawinan" name="status_perkawinan"
                                required>
                                <option value="Kawin" {{$warga->status_perkawinan ==  'Kawin' ? 'selected' : old('status_perkawinan')}}>Kawin</option>
                                <option value="Belum Kawin" {{$warga->status_perkawinan ==  'Belum Kawin' ? 'selected' : old('status_perkawinan')}}>Belum Kawin</option>
                                @error('status_perkawinan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="pekerjaan" class="form-label">Pekerjaan</label>
                            <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" value="{{ old('pekerjaan', $warga->pekerjaan) }}" id="edit-warga-pekerjaan" name="pekerjaan"
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
                            <label for="notelp" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control @error('notelp') is-invalid @enderror" value="{{ old('notelp', $warga->notelp) }}" id="edit-warga-notelp" name="notelp"
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
                                class="form-control select-keluarga rounded @error('keluarga') is-invalid @enderror" required>
                                <option value="" disabled selected>Pilih Nomor Keluarga</option>
                                @foreach ($keluarga as $klga)
                                    <option value="{{ $klga->id_keluarga }}"
                                        {{ $warga->keluarga_id == $klga->id_keluarga ? 'selected' : old('keluarga') }}>
                                        {{ $klga->nokk }} - {{ $klga->kepala_keluarga->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('keluarga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <a href="{{ route('warga.index') }}" class="btn btn-danger me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
