@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            @if (Auth::user()->role == 'rw')
            @else
            <div class="card-tools ms-auto">
                <a href="{{ route('keluarga.create') }}" class="btn btn-md btn-primary mt-1">+ Tambah</a>
            </div>
            @endif
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
            $('#viewDetailKeluargaModal').modal('show');
            $('#modal-body-content').html(
                '<img src="{{ asset('assets/compiled/svg/ball-triangle.svg') }}" class="img-fluid" style="display: block; margin-left: auto; margin-right: auto; width: 50%;" alt="audio">'
            );
            $.ajax({
                url: '/keluarga/' + keluargaId + '/show',
                type: 'GET',
                success: function(keluarga) {
                    console.log(keluarga);
                    $('#modal-body-content').html(`
                        <table class="table table-bordered">
                            <tr>
                                <th>Nomor Kartu Keluarga</th>
                                <td id="detail-nokk"></td>
                            </tr>
                            <tr>
                                <th>Kepala Keluarga</th>
                                <td id="detail-kepala_keluarga"></td>
                            </tr>
                            <tr>
                                <th>RT</th>
                                <td id="detail-rt"></td>
                            </tr>
                            <tr>
                                <th>RW</th>
                                <td id="detail-rw"></td>
                            </tr>
                            <tr>
                                <th>Anggota Keluarga</th>
                                <td id="detail-anggota_keluarga">
                                    <ul id="anggota-keluarga-list">
                                        <!-- List anggota keluarga akan diisi dengan JavaScript -->
                                    </ul>
                                </td>
                            </tr>
                        </table>
                    `);
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
                }
            });
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
