@extends('layouts.app')
@section('content')
    <form action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="pengadu_id" class="form-label">Nama</label>
                    <select class="form-control" id="pengadu_id" name="pengadu_id" required>
                        @foreach ($user as $usr)
                            <option value="{{ $usr->id_user }}">{{ $usr->nama }}</option>
                        @endforeach
                    </select>
                    @error('pengadu_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="rt_id" class="form-label">RT</label>
                    <select class="form-control" id="rt_id" name="rt_id" required>
                        @foreach ($rt as $rt_id)
                            <option value="{{ $rt_id->id_rt }}">{{ $rt_id->nama }}</option>
                        @endforeach
                    </select>
                    @error('rt_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="rw_id" class="form-label">RW</label>
                    <select class="form-control" id="rw_id" name="rw_id" required>
                        @foreach ($rw as $rw_id)
                            <option value="{{ $rw_id->id_rw }}">{{ $rw_id->nama }}</option>
                        @endforeach
                    </select>
                    @error('rw_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="tanggal_kejadian" class="form-label">Tanggal Kejadian</label>
                    <input type="date" class="form-control" id="tanggal_kejadian" name="tanggal_kejadian" required>
                    @error('tanggal_kejadian')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="lampiran" class="form-label">Lampiran</label>
                    <input type="file" class="form-control" id="lampiran" name="lampiran" required>
                    @error('lampiran')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <a href="{{ route('pengaduan.index') }}" class="btn btn-danger">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
