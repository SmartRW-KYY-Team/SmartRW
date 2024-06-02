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
    {{-- @include('warga.edit') --}}
    {{-- @include('warga.delete') --}}

    <!-- Modal Detail Keluarga -->
    <div class="modal fade" id="viewDetailKeluargaModal" tabindex="-1" aria-labelledby="viewDetailKeluargaModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewDetailKeluargaModalLabel">Detail Keluarga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- Script untuk inisialisasi Select2 -->
    <script>
        // $(document).ready(function() {
        // Inisialisasi Select2 setelah halaman selesai dimuat

        // $('.select-agama').select2();
        // $('.select-agama').select2({
        //     placeholder: "Pilih Agama",
        //     allowClear: true,
        //     theme: "bootstrap-5",
        //     width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
        //     dropdownParent: $('#tambahModal'),
        // });
        // });
    </script>

    <script>
        // function showDetailKeluarga(keluargaId) {
        //     $.ajax({
        //         url: '/keluarga/' + keluargaId + '/show',
        //         type: 'GET',
        //         success: function(keluarga) {
        //             $('#detail-nokk').text(keluarga.nokk);
        //             $('#detail-kepala_keluarga').text(keluarga.kepala_keluarga);
        //             $('#detail-rt').text(keluarga.rt);
        //             $('#detail-rw').text(keluarga.rw);

        //             // Kosongkan daftar anggota keluarga sebelum mengisinya kembali
        //             $('#anggota-keluarga-list').empty();

        //             // Tambahkan anggota keluarga ke dalam daftar
        //             keluarga.anggota.forEach(function(anggota) {
        //                 $('#anggota-keluarga-list').append('<li>' + anggota.nama + ' (' + anggota.nik +
        //                     ')</li>');
        //             });

        //             // Tampilkan modal
        //             $('#viewDetailKeluargaModal').modal('show');
        //         }
        //     });
        // }

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
