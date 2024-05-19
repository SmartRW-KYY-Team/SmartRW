@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Surat Domisili</h4>
            <div class="card-tools ms-auto">
                <button class="btn btn-md btn-primary mt-1" data-bs-target="#tambahDomisiliModal" data-bs-toggle="modal">+ Tambah</button>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped']) }}
        </div>
    </div>

    <!-- Modal Tambah -->
    <div class="modal fade" id="tambahDomisiliModal" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Surat Domisili</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Formulir tambah data -->
                    <form action="{{route('domisili.store')}}" method="POST">
                        @csrf
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pemohon" class="form-label">Pemohon</label>
                                <input type="text" class="form-control" id="pemohon" name="pemohon" required>
                                <div class="invalid-feedback" id="pemohonError"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required>
                                <div class="invalid-feedback" id="keteranganError"></div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

{{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
