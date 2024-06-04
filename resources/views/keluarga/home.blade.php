@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Keluarga</h4>
            <div class="card-tools ms-auto">
                <a href="{{ route('keluarga.create') }}" class="btn btn-md btn-primary mt-1">+ Tambah</a>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped']) }}
        </div>
    </div>
    @include('keluarga.show')

@endsection
@push('scripts')
    <script>
        $(document).on('click', '.showButtonDetail', function(e) {
            var keluargaId = $(this).data('id');
            $.ajax({
                url: '/keluarga/' + keluargaId + '/show',
                type: 'GET',
                success: function(keluarga) {
                    console.log(keluarga);
                    $('#detail-nokk').text(keluarga.nokk);
                    $('#detail-kepala_keluarga').text(keluarga.kepala_keluarga);
                    $('#detail-rt').text(keluarga.rt);
                    $('#detail-rw').text(keluarga.rw);

                    // Kosongkan daftar anggota keluarga sebelum mengisinya kembali
                    $('#anggota-keluarga-list').empty();

                    // Tambahkan anggota keluarga ke dalam daftar
                    keluarga.anggota.forEach(function(anggota) {
                        $('#anggota-keluarga-list').append('<li>' + anggota.nama + ' (' +
                            anggota.nik +
                            ')</li>');
                    });

                    // Tampilkan modal
                    $('#viewDetailKeluargaModal').modal('show');
                }
            });
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
