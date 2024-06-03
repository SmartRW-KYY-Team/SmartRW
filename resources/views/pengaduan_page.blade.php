<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTRW - Layanan Pengaduan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style_pengaduan.css') }}">
</head>

<body style="background-color: #f2f7ff">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #f2f7ff">
        <a class="navbar-brand" href="{{ route('landing_page') }}"><img src="{{ asset('assets/image/logo-navbar.svg') }}"
                alt="SMARTRW Logo"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('landing_page') }}">Beranda</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('pengaduan_page') }}">Pengaduan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pengajuan Surat
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('sktm_page') }}">SKTM</a>
                        <a class="dropdown-item" href="{{ route('domisili_page') }}">Domisili</a>
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
                    <h1 class="display-4">Layanan Pengaduan</h1>
                    <p class="lead">
                        Sampaikan laporan Anda secara langsung
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="form-section">
        <div class=" container my-5">
        <div class="card mx-auto" style="max-width: 800px;">
            <div class="card-body">
                <h5 class="card-title" style="background-color: #0b7077;">Sampaikan Laporan Pengaduan Anda</h5>
                <form>
                    <div class="form-group">
                        <label for="namaPengadu">Nama</label>
                        <select class="form-control" id="namaPengadu" required>
                            <option>Pilih nama pengadu</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Kejadian</label>
                        <input type="date" class="form-control" id="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="rt">RT</label>
                        <select class="form-control" id="rt" required>
                            <option>Pilih RT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="rw">RW</label>
                        <select class="form-control" id="rw" required>
                            <option>Pilih RW</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <input type="text" class="form-control" id="keluhan" placeholder="Masukkan keluhan" required>
                    </div>
                    <div class="form-group">
                        <label for="lampiran">Lampiran</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="lampiran" required>
                            <label class="custom-file-label" for="lampiran">Upload foto</label>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn"
                            style="background-color: #0b7077; color: white;">Laporkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Statistics Section -->
    <div class="container-fluid text-white py-5 text-center" style="background-color: #138496;">
        <h3>Jumlah Laporan Sekarang</h3>
        <h1 style="font-weight: 550;">101,696</h1>
        <button class="btn btn-outline-light mt-3">Lihat Selengkapnya</button>
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



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>