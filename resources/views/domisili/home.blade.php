@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Surat Domisili</h4>
        </div>
        <div class="card-body">
            {{ $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped']) }}
        </div>
    </div>
    @include('domisili.create')
    @include('domisili.show')

    <!-- Modal Accept -->
    <div class="modal fade" id="acceptDomisiliModal" tabindex="-1" aria-labelledby="acceptDomisiliModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acceptDomisiliModalLabel">Accept Surat Domisili</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label id="acceptDomisiliModalText">
                        Apakah anda yakin ingin menyetujui surat ini?
                    </label>
                </div>
                <div class="modal-footer">
                    <form id="acceptDomisiliForm" method="POST">
                        @csrf
                        <input type="hidden" id="acceptDomisiliId">
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
        $('body').on('click', '.ShowModalDomisili', function(e) {
            var id_showmodal = $(this).data('id');
            $('#showModalDomisili2').modal('show');
            $.ajax({
                url: `/domisili/${id_showmodal}/show`,
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    // Populate form fields
                    $('#detail-nama').html(data.pemohon.nama);
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
            // Handle form submission
            $('#tambahDomisiliForm').on('submit', function(e) {
                e.preventDefault();

                // Reset error messages
                $('#pemohonError').text('');
                $('#keteranganError').text('');

                // Get form data
                var formData = $(this).serialize();

                // Send AJAX request
                $.ajax({
                    url: "{{ route('domisili.store') }}",
                    method: "POST",
                    data: formData,
                    success: function(response) {
                        // Hide the modal
                        $('#tambahDomisiliModal').modal('hide');

                        // Clear the form
                        $('#tambahDomisiliForm')[0].reset();

                        // Show success alert (using SweetAlert)
                        Swal.fire({
                            title: 'Success',
                            text: 'Data berhasil ditambahkan',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        });

                        // Reload the DataTable
                        $('#dataTableBuilder').DataTable().ajax.reload();
                    },
                    error: function(response) {
                        // Show error messages
                        var errors = response.responseJSON.errors;
                        if (errors.pemohon) {
                            $('#pemohonError').text(errors.pemohon[0]).show();
                        }
                        if (errors.keterangan) {
                            $('#keteranganError').text(errors.keterangan[0]).show();
                        }
                    }
                });
            });

        });
    </script>

    <script>
        $(document).ready(function() {
            // Handle opening the accept modal
            $('body').on('click', '.AcceptModalDomisili', function(e) {
                $('#acceptDomisiliModal').modal('show');
                var id_acceptmodal = $(this).data('id');
                $('#acceptDomisiliForm').attr('action', '/domisili/accept/' + id_acceptmodal);
            });
            // $('#acceptDomisiliModal').on('show.bs.modal', function(event) {
            //     var button = $(event.relatedTarget);
            //     var id = button.data('id');
            //     var nama = button.data('nama');

            //     console.log('Opening accept modal for ID:', id); // Debug log

            //     // Update the modal form action
            // });

            // Handle form submission for accept
            $('#acceptDomisiliForm').on('submit', function(e) {
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
