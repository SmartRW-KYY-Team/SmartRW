@extends('layouts_landing.app')

@section('content')
    @include('layouts_base.app')

    <section>
        <!-- Form Section -->
        <div class="form-section">
            <div class="container-fluid py-5">
                <div class="sktm text-center pt-5">
                    <h1>Surat Keterangan Tidak Mampu</h1>
                </div>
                <div class="d-flex justify-content-center align-items-center" style="min-height: 50vh;">
                    <div class="card shadow" style="max-width: 60%; width: 100%;">
                        
                        <div class="card-header" style="background-color: #4154f1; color: white;">
                            <h5 class="card-title text-center py-2">Cek Status Surat Keterangan Tidak Mampu (SKTM) Anda</h5>
                        </div>
                        <div class="card-body pt-4">
                            <form>
                                <div class="form-group">
                                    <label for="nik" class="required mb-2">NIK</label>
                                    <input type="number" class="form-control" id="nik" placeholder="Masukkan NIK" required>
                                </div>
                                <div class="text-center">
                                    <button type="button" class="btn btn-primary" id="btn-submit-cek-sktm " style="background-color: #4154f1">Cek</button>
                                </div>
                            </form>
                        </div>
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
                        <h5 class="modal-title" id="statusModalLabel">Status SKTM</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body-content">
                        <!-- Konten akan diisi melalui JavaScript -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
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
        $('#btn-submit-cek-sktm').on('click', function(e) {
            var nik = $('#nik').val();
            if (nik) {
                $('#statusModal').modal('show');
                $('#modal-body-content').html(
                    '<p>Mohon Tunggu Sebentar Data Anda Sedang Di Proses</p>'
                );
                $.ajax({
                    url: `/cek_status_sktm/${nik}/cek_status`,
                    method: 'GET',
                    success: function(response) {
                        console.log(response);
                        $('#statusModal').modal('show');
                        if (response.message.includes(
                                'NIK ditemukan pada daftar pengajuan SKTM')) {
                            $('#modal-body-content').html(`
                                <p>${response.message}</p>
                                <a href="/suratsktm-pdf/${response.id}" target="_blank" class="btn btn-primary">Download SKTM</a>
                            `);
                        } else {
                            $('#modal-body-content').html(`
                                <p>${response.message}</p>
                            `);
                        }
                    },
                    error: function(error) {
                        console.log(error);
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