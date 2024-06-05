@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="my-4">Ubah RT</h2>

        <form action="{{ route('rt.update', $rt->id_rt) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="ketua_id" class="form-label">Ketua RT</label>
                <select class="form-select @error('ketua_id') is-invalid @enderror"
                value="{{ old('ketua_id', $rt->ketua_id) }}" id="ketua_id" name="ketua_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id_user }}" {{ $rt->ketua_id == $user->id_user ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
                @error('ketua_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sekretaris_id" class="form-label">Sekretaris RT</label>
                <select class="form-select @error('sekretaris_id') is-invalid @enderror"
                value="{{ old('sekretaris_id', $rt->sekretaris_id) }}" id="sekretaris_id" name="sekretaris_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id_user }}" {{ $rt->sekretaris_id == $user->id_user ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
                @error('sekretaris_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="bendahara_id" class="form-label">Bendahara RT</label>
                <select class="form-select @error('bendahara_id') is-invalid @enderror"
                    value="{{ old('bendahara_id', $rt->bendahara_id) }}" id="bendahara_id" name="bendahara_id" required>
                    @foreach ($users as $user)
                        <option value="{{ $user->id_user }}" {{ $rt->bendahara_id == $user->id_user ? 'selected' : '' }}>
                            {{ $user->nama }}
                        </option>
                    @endforeach
                </select>
                @error('bendahara_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{ route('rt.index') }}" class="btn btn-danger me-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
