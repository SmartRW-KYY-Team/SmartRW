@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Pengaduan</h4>
            <div class="card-tools ms-auto">
                <a href="{{ route('pengaduan.create') }}" class="btn btn-md btn-primary mt-1">+ Tambah</a>
            </div>
        </div>
        <div class="card-body">
            {{-- {{ $dataTable->table() }} --}}
            {{ $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped']) }}
        </div>
    </div>
    <!-- Modal Detail -->
    <div class="modal fade" id="viewPengaduanModal" tabindex="-1" aria-labelledby="viewPengaduanModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewPengaduanModalLabel">Detail Pengaduan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Deskripsi</th>
                            <td id="detail-deskripsi"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Kejadian</th>
                            <td id="detail-tanggal_kejadian"></td>
                        </tr>
                        <tr>
                            <th>Lampiran</th>
                            <td>
                                <img alt="lampiran" id="detail-lampiran">
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

    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label id="deletePengaduanModalText">
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
        $('body').on('click', '.showDetailPengaduButton', function(e) {
            var id_detail = $(this).data('id');
            $('#viewPengaduanModal').modal('show');
            $.ajax({
                url: `/pengaduan/${id_detail}/show`,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    // Populate form fields
                    $('#detail-deskripsi').html(data.deskripsi);
                    $('#detail-tanggal_kejadian').html(data.tanggal_kejadian);
                    $('#detail-tanggal_kejadian').html(data.tanggal_kejadian);
                    $('#detail-lampiran').html('Fitur blum jadi brou');
                    $('#detail-lampiran').attr('src',
                        `{{ asset('storage/lampiran/lampiranImage') }}`
                        .replace('lampiranImage',
                            data.lampiran));
                }
            });
        });
        $(document).ready(function() {
            $('#viewPengaduanModal').on('hidden.bs.modal', function() {
                $(this).find('form').trigger('reset');
            })
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
