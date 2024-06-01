@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tambah Keluarga Calon Penerima Bantuan Sosial</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('bansos.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="keluarga_id">Kepala Keluarga</label>
                <select name="keluarga_id" id="keluarga_id" class="form-control">
                    <option value=""></option>
                    @foreach($users as $user)
                        <option value="{{ $user->keluarga_id }}"> {{ $user->no_kk }} --  {{ $user->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="K1">Pendapatan</label>
                <select name="K1" id="K1" class="form-control">
                    <option value=""></option>
                    <option value="1">1. < 1.000.000</option>
                    <option value="2">2. 1.000.000 - 1.999.999</option>
                    <option value="3">3. 2.000.000 - 2.999.999</option>
                    <option value="4">4. 3.000.000 - 3.999.999</option>
                    <option value="5">5. >= 4.000.000</option>
                </select>
            </div>
            <div class="form-group">
                <label for="K2">Kendaraan</label>
                <select name="K2" id="K2" class="form-control">
                    <option value=""></option>
                    <option value="1">1. </option>
                    <option value="2">2. </option>
                    <option value="3">3. </option>
                    <option value="4">4. </option>
                    <option value="5">5. </option>
                </select>
            </div>
            <div class="form-group">
                <label for="K3">Jenis Lantai</label>
                <select name="K3" id="K3" class="form-control">
                    <option value=""></option>
                    <option value="1">1. Plester/Semen</option>
                    <option value="2">2. Keramik</option>
                </select>
            </div>
            <div class="form-group">
                <label for="K4">Kondisi Dinding</label>
                <select name="K4" id="K4" class="form-control">
                    <option value=""></option>
                    <option value="1">1. Kurang</option>
                    <option value="2">2. Cukup Baik</option>
                    <option value="3">3. Baik</option>
                </select>
            </div>
            <div class="form-group">
                <label for="K5">Kondisi Atap</label>
                <select name="K5" id="K5" class="form-control">
                    <option value=""></option>
                    <option value="1">1. Kurang</option>
                    <option value="2">2. Cukup Baik</option>
                    <option value="3">3. Baik</option>
                </select>
            </div>
            <div class="form-group">
                <label for="K6">Tanggungan</label>
                <select name="K6" id="K6" class="form-control">
                    <option value=""></option>
                    <option value="1">1. </option>
                    <option value="2">2. </option>
                    <option value="3">3. </option>
                    <option value="4">4. </option>
                    <option value="5">5. </option>
                </select>
            </div>
            <div class="form-group">
                <label for="K7">Listrik</label>
                <select name="K7" id="K7" class="form-control">
                    <option value=""></option>
                    <option value="1">1. 450 VA </option>
                    <option value="2">2. 900 VA </option>
                    <option value="3">3. > 900 VA </option>
                </select>
            </div>
            <div class="form-group">
                <label for="K8">Luas Tanah</label>
                <select name="K8" id="K8" class="form-control">
                    <option value=""></option>
                    <option value="1">1. </option>
                    <option value="2">2. </option>
                    <option value="3">3. </option>
                    <option value="4">4. </option>
                    <option value="5">5. </option>
                </select>
            </div>
            <div class="form-group">
                <label for="K9">Luas Bangunan</label>
                <select name="K9" id="K9" class="form-control">
                    <option value=""></option>
                    <option value="1">1. </option>
                    <option value="2">2. </option>
                    <option value="3">3. </option>
                    <option value="4">4. </option>
                    <option value="5">5. </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
