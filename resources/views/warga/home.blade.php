@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Warga</h4>
            <div class="card-tools ms-auto">
                <a href="{{ url('kategori/create') }}" class="btn btn-md btn-primary mt-1" data-bs-target="#tambahModal"
                    data-bs-toggle="modal">+ Tambah</a>
            </div>
        </div>
        <div class="card-body">
            {{-- {{ $dataTable->table() }} --}}
            {{ $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped']) }}
        </div>
    </div>
    @include('warga.edit')
    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label id="deleteWargaModalText">
                        Apakah Anda yakin ingin menghapus data ini?
                    </label>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        {{-- @method('DELETE') --}}
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('warga.create')
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
        $('body').on('click', '.deleteButton', function(e) {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            $('#deleteModal').modal('show');
            $("#deleteWargaModalText").html("Apakah Anda yakin ingin menghapus data " + nama + '?');
            // $('#deleteForm').attr('action', '/warga/' + id);
            $('#deleteForm').attr('action', "{{ route('warga.destroy', ['id' => 'id_user']) }}".replace('id_user',
                id));
        });
        $('body').on('click', '.editWargaButton', function(e) {
            $('#EditWargaModal').modal('show');
            var id_edit = $(this).data('id');
            $.ajax({
                url: `/warga/${id_edit}/edit`,
                method: 'GET',
                success: function(data) {
                    // Populate form fields
                    $('#userId').val(data.id);
                    $('#edit-warga-nama').val(data.nama);
                    $('#edit-warga-nik').val(data.nik);
                    // Populate other fields similarly...
                    $('#edit-warga-tgl_lahir').val(data.tgl_lahir);
                    $('#edit-warga-tempat_lahir').val(data.tempat_lahir);
                    $('#edit-warga-jenis_kelamin').val(data.jenis_kelamin);
                    $('#edit-warga-agama').val(data.agama_id);
                    $('#edit-warga-status_perkawinan').val(data.status_perkawinan);
                    $('#edit-warga-pekerjaan').val(data.pekerjaan);
                    $('#edit-warga-notelp').val(data.notelp);
                    $('#edit-warga-keluarga').val(data.keluarga_id);

                    // Update the form action
                    $('#updateWargaModal').attr('action',
                        "{{ route('warga.update', ['id' => 'id_edit']) }}"
                        .replace('id_edit',
                            id_edit));
                    // $('#updateWargaModal').attr('action', `/warga/${id_edit}/update`);

                    // Update modal title
                    $('#editModalLabel').text('Edit Data Pengguna');

                    // Show the modal
                    $('#editModal').modal('show');
                }
            });
        });
        $(document).ready(function() {
            $('#EditWargaModal').on('hidden.bs.modal', function() {
                $(this).find('form').trigger('reset');
            })
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
