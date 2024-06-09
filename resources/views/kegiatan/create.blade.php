@extends('layouts.app')
@section('content')
    <div class="card-header d-flex">
        <h4 class="card-title">Tambah Kegiatan</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="exampleFormControlTextarea1" rows="2"
                            name="deskripsi">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Lampiran</label>
                        <input class="form-control @error('lampiran') is-invalid @enderror" type="file" id="formFile"
                            name="lampiran">
                        @error('lampiran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_kegiatan" class="form-label">Tanggal Kegiatan</label>
                        <input type="date" class="form-control @error('tanggal_kegiatan') is-invalid @enderror"
                            id="tanggal_kegiatan" name="tanggal_kegiatan" required value="{{ old('tanggal_kegiatan') }}">
                        @error('tanggal_kegiatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            @if (session('role') == 'rw')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rt" class="form-label">Tempat RT</label>
                            <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id"
                                required>
                                @foreach ($rt as $t)
                                    <option value="{{ $t->id_rt }}" {{ old('rt_id') == $t->id_rt ? 'selected' : '' }}>
                                        {{ $t->nama }}</option>
                                @endforeach
                            </select>
                            @error('rt_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            @elseif(session('role') == 'rt')
                <input type="hidden" name="rt_id" value="{{ session('no_role') }}">
            @endif

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const datePicker = document.getElementById('tanggal_kegiatan');
            const today = new Date().toISOString().split('T')[0];
            datePicker.setAttribute('min', today);
        });
    </script>
@endpush
