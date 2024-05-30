@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Warga</h4>
            <div class="card-tools ms-auto">
                <a href="{{ route('warga.create') }}" class="btn btn-md btn-primary mt-1">+ Tambah</a>
            </div>
        </div>
        <div class="card-body">
            {{-- {{ $dataTable->table() }} --}}
            {{ $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped']) }}
        </div>
    </div>
    @include('warga.detail')
    @include('warga.delete')
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
        $('body').on('click', '.DetailButton', function(e) {
            var id_detail = $(this).data('id');
            $('#detailWargaModal').modal('show');
            $.ajax({
                url: `/warga/${id_detail}/show`,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    // Populate form fields
                    $('#detail-nama').html(data.nama);
                    $('#detail-nik').html(data.nik);
                    $('#detail-tgl_lahir').html(data.tgl_lahir);
                    $('#detail-tempat_lahir').html(data.tempat_lahir);
                    $('#detail-jenis_kelamin').html(data.jenis_kelamin);
                    $('#detail-agama').html(data.agama.nama);
                    $('#detail-status_perkawinan').html(data.status_perkawinan);
                    $('#detail-pekerjaan').html(data.pekerjaan);
                    $('#detail-notelp').html(data.notelp);
                    if (data.keluarga_id == null) {
                        $('#detail-keluarga').html('Belum Mempunyai Nomor Keluarga');
                    } else {
                        $('#detail-keluarga').html(data.keluarga.id_keluarga);
                    }
                    $('#detail-lampiran').attr('src',
                        `{{ asset('storage/lampiran/lampiranImage') }}`
                        .replace('lampiranImage',
                            data.lampiran));
                }
            });
        });
        $(document).ready(function() {
            $('#detailWargaModal').on('hidden.bs.modal', function() {
                $('#detail-nama').html('');
                $('#detail-nik').html('');
                $('#detail-tgl_lahir').html('');
                $('#detail-tempat_lahir').html('');
                $('#detail-jenis_kelamin').html('');
                $('#detail-agama').html('');
                $('#detail-status_perkawinan').html('');
                $('#detail-pekerjaan').html('');
                $('#detail-notelp').html('');
                $('#detail-keluarga').html('');
            })
        });
    </script>
    <script>
        $('body').on('click', '.deleteButton', function(e) {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            $('#deleteModal').modal('show');
            $("#deleteWargaModalText").html("Apakah Anda yakin ingin menghapus data " + nama + '?');
            // $('#deleteForm').attr('action', '/warga/' + id);
            $('#deleteForm').attr('action', "{{ route('warga.destroy', ['id' => 'id_user']) }}".replace('id_user',
                id));
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
