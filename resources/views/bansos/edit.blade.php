@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Tambah Keluarga Calon Penerima Bantuan Sosial</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('/bansos/' . $bansos->id_bansos . '/update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="keluarga_id">Kepala Keluarga</label>
                    <select name="keluarga_id" id="keluarga_id"
                        class="form-control  @error('keluarga_id') is-invalid @enderror" disabled>
                        @foreach ($users as $user)
                            <option value="{{ $user->keluarga_id }}"
                                {{ $user->keluarga_id == $bansos->keluarga_id ? 'selected' : old('keluarga_id') }}>
                                {{ $user->no_kk }} -- {{ $user->nama }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="keluarga_id" value="{{ $bansos->keluarga_id }}">
                    @error('keluarga_id')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="K1">Pendapatan</label>
                    <select name="K1" id="K1" class="form-control  @error('K1') is-invalid @enderror">
                        <option value="1" {{ $bansos->K1 == 1 ? 'selected' : old('K1') }}>
                            < 1.000.000</option>
                        <option value="2" {{ $bansos->K1 == 2 ? 'selected' : old('K1') }}> 1.000.000 - 1.999.999
                        </option>
                        <option value="3" {{ $bansos->K1 == 3 ? 'selected' : old('K1') }}> 2.000.000 - 2.999.999
                        </option>
                        <option value="4" {{ $bansos->K1 == 4 ? 'selected' : old('K1') }}> 3.000.000 - 3.999.999
                        </option>
                        <option value="5" {{ $bansos->K1 == 5 ? 'selected' : old('K1') }}> >= 4.000.000</option>
                    </select>
                    @error('K1')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="K2">Kendaraan</label>
                    <select name="K2" id="K2" class="form-control @error('K2') is-invalid @enderror">
                        <option value="1" {{ $bansos->K2 == 1 ? 'selected' : old('K2') }}>Tidak Memiliki Kendaraan
                        </option>
                        <option value="2" {{ $bansos->K2 == 2 ? 'selected' : old('K2') }}>Memiliki 1 Motor Dibawah
                            Tahun 2013</option>
                        <option value="3" {{ $bansos->K2 == 3 ? 'selected' : old('K2') }}>Memiliki 1 Motor Diatas
                            Tahun 2013 </option>
                        <option value="4" {{ $bansos->K2 == 4 ? 'selected' : old('K2') }}>Memiliki 2 Motor atau lebih
                        </option>
                        <option value="5" {{ $bansos->K2 == 5 ? 'selected' : old('K2') }}>Memiliki Mobil</option>
                    </select>
                    @error('K2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="K3">Jenis Lantai</label>
                    <select name="K3" id="K3" class="form-control @error('K3') is-invalid @enderror">
                        <option value="1" {{ $bansos->K3 == 1 ? 'selected' : old('K3') }}> Plester/Semen</option>
                        <option value="2" {{ $bansos->K3 == 2 ? 'selected' : old('K3') }}> Keramik</option>
                    </select>
                    @error('K3')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="K4">Kondisi Dinding</label>
                    <select name="K4" id="K4" class="form-control @error('K4') is-invalid @enderror">
                        <option value="1" {{ $bansos->K4 == 1 ? 'selected' : old('K4') }}> Kurang</option>
                        <option value="2" {{ $bansos->K4 == 2 ? 'selected' : old('K4') }}> Cukup</option>
                        <option value="3" {{ $bansos->K4 == 3 ? 'selected' : old('K4') }}> Baik</option>
                    </select>
                    @error('K4')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="K5">Kondisi Atap</label>
                    <select name="K5" id="K5" class="form-control @error('K5') is-invalid @enderror">
                        <option value="1" {{ $bansos->K5 == 1 ? 'selected' : old('K5') }}> Kurang</option>
                        <option value="2" {{ $bansos->K5 == 2 ? 'selected' : old('K5') }}> Cukup</option>
                        <option value="3" {{ $bansos->K5 == 3 ? 'selected' : old('K5') }}> Baik</option>
                    </select>
                    @error('K5')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="K6">Tanggungan</label>
                    <select name="K6" id="K6" class="form-control @error('K6') is-invalid @enderror">
                        <option value="1" {{ $bansos->K6 == 1 ? 'selected' : old('K6') }}>Pasangan </option>
                        <option value="2" {{ $bansos->K6 == 2 ? 'selected' : old('K6') }}>1 Anak </option>
                        <option value="3" {{ $bansos->K6 == 3 ? 'selected' : old('K6') }}>2 Anak atau lebih
                        </option>
                        <option value="4" {{ $bansos->K6 == 4 ? 'selected' : old('K6') }}>Lebih dari 2 Anak dengan 1
                            Tanggungan lain</option>
                        <option value="5" {{ $bansos->K6 == 5 ? 'selected' : old('K6') }}>Lebih dari 2 Anak dan 2
                            atau Lebih Tanggungan Lain </option>
                    </select>
                    @error('K6')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="K7">Listrik</label>
                    <select name="K7" id="K7" class="form-control @error('K7') is-invalid @enderror">
                        <option value="1" {{ $bansos->K7 == 1 ? 'selected' : old('K7') }}> 450 VA </option>
                        <option value="2" {{ $bansos->K7 == 2 ? 'selected' : old('K7') }}> 900 VA </option>
                        <option value="3" {{ $bansos->K7 == 3 ? 'selected' : old('K7') }}> >= 1300 VA </option>
                    </select>
                    @error('K7')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="K8">Luas Tanah</label>
                    <select name="K8" id="K8" class="form-control @error('K8') is-invalid @enderror">
                        <option value="1" {{ $bansos->K8 == 1 ? 'selected' : old('K8') }}>0 -50 m2 </option>
                        <option value="2" {{ $bansos->K8 == 2 ? 'selected' : old('K8') }}>50 -100 m2 </option>
                        <option value="3" {{ $bansos->K8 == 3 ? 'selected' : old('K8') }}>100 -200 m2 </option>
                        <option value="4" {{ $bansos->K8 == 4 ? 'selected' : old('K8') }}> >200 m2 </option>
                    </select>
                    @error('K8')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="K9">Luas Bangunan</label>
                    <select name="K9" id="K9" class="form-control @error('K9') is-invalid @enderror">
                        <option value="1" {{ $bansos->K9 == 1 ? 'selected' : old('K9') }}>0-50 m2 </option>
                        <option value="2" {{ $bansos->K9 == 2 ? 'selected' : old('K9') }}>50-100 m2 </option>
                        <option value="3" {{ $bansos->K9 == 3 ? 'selected' : old('K9') }}>100 -150 m2 </option>
                        <option value="4" {{ $bansos->K9 == 4 ? 'selected' : old('K9') }}>150 -200 m2 </option>
                        <option value="5" {{ $bansos->K9 == 5 ? 'selected' : old('K9') }}> >200 m2 </option>
                    </select>
                    @error('K9')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection
