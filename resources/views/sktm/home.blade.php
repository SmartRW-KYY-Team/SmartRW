@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
        </div>
        <div class="card-body">
            {{ $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped']) }}
        </div>
    </div>
    {{-- @include('sktm.create') --}}
    @include('sktm.show')

    <!-- Modal Accept -->
    <div class="modal fade" id="acceptSKTMModal" tabindex="-1" aria-labelledby="acceptSKTMModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acceptSKTMModalLabel">Accept Surat SKTM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label id="acceptSKTMModalText">
                        Apakah anda yakin ingin menyetujui surat ini?
                    </label>
                </div>
                <div class="modal-footer">
                    <form id="acceptSKTMForm" method="POST">
                        @csrf
                        <input type="hidden" id="acceptSKTMId">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Setuju</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Handle opening the show modal
        $('body').on('click', '.ShowModalSKTM', function(e) {
            $('#showModalSKTM2').modal('show');
            var id_showmodal = $(this).data('id');
            $.ajax({
                url: `/sktm/${id_showmodal}/show`,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    // Populate form fields
                    $('#detail-nama').html(data.pemohon.nama);
                    $('#detail-orangtua').html(data.nama_orang_tua);
                    $('#detail-pekerjaan').html(data.pekerjaan_orang_tua);
                    $('#detail-gaji').html(data.gaji_orang_tua);
                    $('#detail-status').html(data.status);
                    $('#detail-rt').html(data.rt.nama);
                    $('#detail-rw').html(data.rw.nama);
                    $('#detail-keterangan').html(data.keterangan);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Handle opening the accept modal
            $('body').on('click', '.AcceptModalSKTM', function(e) {
                $('#acceptSKTMModal').modal('show');
                var id_acceptmodal = $(this).data('id');
                $('#acceptSKTMForm').attr('action', '/sktm/accept/' + id_acceptmodal);
            });
            $('#acceptSKTMForm').on('submit', function(e) {
                e.preventDefault();

                var formAction = $(this).attr('action');
                var formData = $(this).serialize();

                console.log('Submitting form to:', formAction); // Debug log

                $.ajax({
                    url: formAction,
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        console.log('Success response:', response); // Debug log

                        // Show success alert (using SweetAlert)
                        Swal.fire({
                            title: 'Success',
                            text: 'Status berhasil diperbarui',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // Reload the DataTable after the alert is closed
                            if (result.isConfirmed) {
                                $('#dataTableBuilder').DataTable().ajax.reload();
                                window.location.reload();
                            }
                        });
                    },
                    error: function(response) {
                        console.log('Error response:', response); // Debug log

                        // Handle error
                        Swal.fire({
                            title: 'Error',
                            text: 'Terjadi kesalahan saat memperbarui status',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            });
        });
    </script>



    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
