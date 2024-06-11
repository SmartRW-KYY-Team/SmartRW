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
                    @if (Auth::user()->role == 'rt')
                        <input type="text" class="form-control" value="{{ $rts[0]->id_rt }}" readonly
                            @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id">
                    @else
                        <select class="form-control @error('rt_id') is-invalid @enderror" id="rt_id" name="rt_id">
                            <option value="" disabled selected>Pilih RT</option>
                            @foreach ($rts as $rt)
                                <option value="{{ $rt->id_rt }}">{{ $rt->nama }}</option>
                            @endforeach
                        </select>
                    @endif
                    @error('rt_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="rw_id" class="form-label">RW</label>
                    <input type="text" class="form-control" value="{{ $rws[0]->id_rw }}" readonly
                        @error('rw_id') is-invalid @enderror" id="rw_id" name="rw_id">
                    @error('rw_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
                    '<td><select name="user_id[]" class="form-control nik-select" required><option value="" disabled selected>Pilih Anggota</option>@foreach ($users as $user) @if ($user->keluarga_id == null)<option value="{{ $user->id_user }}">{{ $user->nama }} - {{ $user->nik }}</option>@endif @endforeach</select></td>' +
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
