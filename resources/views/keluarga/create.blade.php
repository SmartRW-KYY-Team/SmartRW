@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Add Keluarga</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('keluarga.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nokk" class="form-label">Nomor Kartu Keluarga</label>
                    <input type="text" class="form-control @error('nokk') is-invalid @enderror" id="nokk"
                        name="nokk" value="{{ old('nokk') }}">
                    @error('nokk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="kepala_keluarga_id" class="form-label">Kepala Keluarga</label>
                    <select class="form-control @error('kepala_keluarga_id') is-invalid @enderror" id="kepala_keluarga_id"
                        name="kepala_keluarga_id">
                        <option value="" disabled selected>Pilih Kepala Keluarga</option>
                        @foreach ($wargas as $warga)
                            @if ($warga->keluarga_id == null)
                                <option value="{{ $warga->id_user }}">{{ $warga->nama }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('kepala_keluarga_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rt_id" class="form-label">RT</label>
                    <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id">
                        <option value="" disabled selected>Pilih RT</option>
                        @foreach ($rts as $rt)
                            <option value="{{ $rt->id_rt }}">{{ $rt->nama }}</option>
                        @endforeach
                    </select>
                    @error('rt_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rw_id" class="form-label">RW</label>
                    <select class="form-control @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id">
                        <option value="" disabled selected>Pilih RW</option>
                        @foreach ($rws as $rw)
                            <option value="{{ $rw->id_rw }}">{{ $rw->nama }}</option>
                        @endforeach
                    </select>
                    @error('rw_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <a href="{{ route('keluarga.index') }}" class="btn btn-danger me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
