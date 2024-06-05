@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Edit Keluarga</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('keluarga.update', ['id' => $keluarga->id_keluarga]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nokk" class="form-label">Nomor Kartu Keluarga</label>
                            <input type="text" class="form-control @error('nokk') is-invalid @enderror"
                                value="{{ old('nokk', $keluarga->nokk) }}" id="edit-keluarga-nokk" name="nokk" required>
                            @error('nokk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="kepala_keluarga_id" class="form-label">Kepala Keluarga</label>
                            <select name="kepala_keluarga_id" id="edit-keluarga-kepala_keluarga_id"
                                class="form-control @error('kepala_keluarga_id') is-invalid @enderror" required>
                                @foreach ($users as $user)
                                    @if ($user->keluarga_id == null || $user->keluarga_id != $keluarga->kepala_keluarga_id)
                                        <option value="{{ $user->id_user }}"
                                            {{ $keluarga->kepala_keluarga_id == $user->id_user ? 'selected' : old('kepala_keluarga_id') }}>
                                            {{ $user->nama }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kepala_keluarga_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="rt_id" class="form-label">RT</label>
                            <select name="rt_id" id="edit-keluarga-rt_id"
                                class="form-control @error('rt_id') is-invalid @enderror" required>
                                @foreach ($rts as $rt)
                                    <option value="{{ $rt->id_rt }}"
                                        {{ $keluarga->rt_id == $rt->id_rt ? 'selected' : old('rt_id') }}>
                                        {{ $rt->nama }}
                                    </option>
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
                            <select name="rw_id" id="edit-keluarga-rw_id"
                                class="form-control @error('rw_id') is-invalid @enderror" required>
                                @foreach ($rws as $rw)
                                    <option value="{{ $rw->id_rw }}"
                                        {{ $keluarga->rw_id == $rw->id_rw ? 'selected' : old('rw_id') }}>
                                        {{ $rw->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('rw_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="anggota_keluarga" class="form-label">Anggota Keluarga</label>
                            <table class="table table-bordered" id="anggota-keluarga-table">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($keluarga->members as $member)
                                        @if ($member->id_user != $keluarga->kepala_keluarga_id)
                                            <tr>
                                                <td>
                                                    <select class="form-control nik-select" name="user_id[]" required>
                                                        <option value="" disabled selected>Pilih Anggota</option>
                                                        @foreach ($users as $user)
                                                            @if ($user->keluarga_id == null || $user->id_user != $keluarga->kepala_keluarga_id)
                                                                <option value="{{ $user->id_user }}"
                                                                    {{ $user->id_user == $member->id_user ? 'selected' : '' }}>
                                                                    {{ $user->nik }} - {{ $user->nama }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm remove-member">Hapus</button>
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" class="btn btn-success btn-sm" id="add-member">Tambah Anggota</button>
                        </div>
                    </div>
                </div>
                <a href="{{ route('keluarga.index') }}" class="btn btn-danger me-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#add-member').on('click', function() {
                $('#anggota-keluarga-table tbody').append('<tr>' +
                    '<td><select name="user_id[]" class="form-control nik-select" required><option value="" disabled selected>Pilih Anggota</option>@foreach ($users as $user) @if ($user->keluarga_id == null && $user->id_user != $keluarga->kepala_keluarga_id)<option value="{{ $user->id_user }}">{{ $user->nama }} - {{ $user->nik }}</option>@endif @endforeach</select></td>' +
                    '<td><button type="button" class="btn btn-danger btn-sm remove-member">Hapus</button></td>' +
                    '</tr>'
                );
            });

            $('#anggota-keluarga-table tbody').on('click', '.remove-member', function() {
                $(this).closest('tr').remove();
            });

            $('#anggota-keluarga-table').on('change', '.nik-select', function() {
                var selecteduser_id = $(this).val();
                var row = $(this).closest('tr');
                $.ajax({
                    url: `/warga/${selecteduser_id}/show`,
                    type: 'GET',
                    success: function(data) {
                        console.log(data);
                        row.find('.member-nama').val(data.nama);
                    }
                });
            });

            // Trigger change event on page load to populate names
            $('.nik-select').trigger('change');
        });
    </script>
@endpush
