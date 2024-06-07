<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTRW - Layanan Pengajuan Domisili</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style_status_domisili.css') }}">
    <style>
        .required:after {
            content: "*";
            color: red;
            margin-left: 5px;
        }
    </style>
</head>

<body style="background-color: #f2f7ff">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #f2f7ff">
        <a class="navbar-brand" href="{{ route('landing_page') }}"><img
                src="{{ asset('assets/image/logo-navbar.svg') }}" alt="SMARTRW Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('landing_page') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('pengaduan_page') }}">Pengaduan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Keuangan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('keuanganWarga.rt.index') }}">RT</a>
                        <a class="dropdown-item" href="{{ route('keuanganWarga.rw.index') }}">RW</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kegiatan_page') }}">Agenda Kegiatan</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pengajuan Surat
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('sktm_page') }}">SKTM</a>
                        <a class="dropdown-item" href="{{ route('cek_sktm_page') }}">Status SKTM</a>
                        <a class="dropdown-item" href="{{ route('domisili_page') }}">Domisili</a>
                        <a class="dropdown-item active" href="{{ route('cek_domisili_page') }}">Status Domisili</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-4">Cek Status Pengajuan Surat Domisili</h1>
                    <p class="lead">
                        Cek status surat Anda secara langsung
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="form-section">
        <div class="container my-5">
            <div class="card mx-auto" style="max-width: 800px;">
                <div class="card-header">
                    <h5 class="card-title" style="background-color: #0b7077; color: white;">Cek Status Surat Keterangan
                        Domisili Anda</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="nik" class="required">NIK</label>
                            <input type="number" class="form-control" id="nik" placeholder="Masukkan NIK"
                                required>
                        </div>
                        <div>
                            <button type="button" class="btn" style="background-color: #0b7077; color: white;"
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

    <!-- Footer -->
    <footer class="text-center py-4" style="background-color: #D2E6E4">
        <div class="container">
            <p class="mb-1">Alamat: Jl. Kembang Turi, Lowokwaru, Kota Malang</p>
            <p class="mb-1">
                Telp:
                <a href="https://wa.me/628110992160" style="color: #25D366; text-decoration: underline;">
                    +628110992160
                </a>
            </p>
            <p class="mb-1">Jam Respon: 07.00 WIB - 20.00 WIB</p>
            <p class="mb-1">Email: info@smartrw.co.id</p>
            <br>
            <small>Copyright 2024 &copy; SMARTRW</small>
        </div>
    </footer>

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
</body>

</html>
