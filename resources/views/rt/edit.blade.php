@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit RT</h1>

    <form action="{{ route('rt.update', $rt->id_rt) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="ketua_id" class="form-label">Ketua RT</label>
            <select class="form-select" id="ketua_id" name="ketua_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id_user }}" {{ $rt->ketua_id == $user->id_user ? 'selected' : '' }}>
                        {{ $user->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="sekretaris_id" class="form-label">Sekretaris RT</label>
            <select class="form-select" id="sekretaris_id" name="sekretaris_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id_user }}" {{ $rt->sekretaris_id == $user->id_user ? 'selected' : '' }}>
                        {{ $user->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="bendahara_id" class="form-label">Bendahara RT</label>
            <select class="form-select" id="bendahara_id" name="bendahara_id" required>
                @foreach($users as $user)
                    <option value="{{ $user->id_user }}" {{ $rt->bendahara_id == $user->id_user ? 'selected' : '' }}>
                        {{ $user->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="saldo" class="form-label">Saldo RT</label>
            <input type="number" class="form-control" id="saldo" name="saldo" value="{{ $rt->saldo }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
