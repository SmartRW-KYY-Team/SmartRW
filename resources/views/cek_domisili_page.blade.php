@extends('layouts_landing.app')
<!-- Main -->
@section('content')
    @include('layouts_base.app')

    <section>
        <!-- Form Section -->
        <div class="form-section">
            <div class="container-fluid py-5">
                <div class="domisili text-center pt-5">
                    <h1>Surat Keterangan Domisili</h1>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="card shadow" style="max-width: 60%; width: 100%;">
                        <div class="card-header" style="background-color: #4154f1; color: white;">
                            <h5 class="card-title text-center py-2">Cek Status Surat Domisili Anda</h5>
                        </div>
                    <div class="card-body py-3">
                        <form>
                            <div class="form-group">
                                <label for="nik" class="required mb-2">NIK</label>
                                <input type="number" class="form-control" id="nik" placeholder="Masukkan NIK"
                                    required>
                            </div>
                            <div class="text-center">
                                <button type="button" class="btn" style="background-color: #4154f1; color: white;"
                                    id="btn-submit-cek-domisili">Cek</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="statusModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="statusModalLabel">Status Surat Domisili</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body-content">
                        <!-- Konten akan diisi melalui JavaScript -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#btn-submit-cek-domisili').on('click', function(e) {
                var nik = $('#nik').val();
                $('#statusModal').modal('show');
                $('#modal-body-content').html(
                    '<p>Mohon Ditunggu Data Anda Sedang Diproses.</p>'
                );
                if (nik) {
                    $.ajax({
                        url: `/cek_status_domisili/${nik}`,
                        method: 'GET',
                        success: function(response) {
                            $('#statusModal').modal('show');
                            if (response.message.includes(
                                    'NIK ditemukan pada daftar pengajuan Surat Domisili')) {
                                $('#modal-body-content').html(`
                                <p>${response.message}</p>
                                <a href="/suratdomisili-pdf/${response.id}" target="_blank" class="btn btn-primary">Download Surat Domisili</a>
                            `);
                            } else {
                                $('#modal-body-content').html(`
                                <p>${response.message}</p>
                            `);
                            }
                        },
                        error: function(error) {
                            console.error(error);
                            $('#statusModal').modal('show');
                            $('#modal-body-content').html(
                                '<p>Terjadi kesalahan saat memproses permintaan Anda. Silakan coba lagi nanti.</p>'
                            );
                        }
                    });
                } else {
                    alert('Harap masukkan NIK');
                }
            });
        });
    </script>
@endpush
