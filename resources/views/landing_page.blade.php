<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SMARTRW</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/style_landing.css') }}" />
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
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('landing_page') }}">Beranda</a>
                </li>
                <li class="nav-item">
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
                <div class="col-md-6">
                    <h1 class="display-4">Selamat Datang</h1>
                    <p class="lead">
                        Di Website RW 04 Kelurahan Jatimulyo, Kecamatan Lowokwaru, Kabupaten Malang
                    </p>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="container">
        <!-- RW Section -->
        <div class="text-center title-after-jumbotron my-5">
            <div class="row">
                <div class="col-md-8">
                    <h2>RW 04 Jatimulyo</h2>
                    <hr
                        style="height: 3px; width: 10%; background-color: #0b7077; border: none; margin-left:0; margin-bottom:20px">
                    <p>
                        RW 04 di Kelurahan Jatimulyo, Kabupaten Malang, adalah wilayah yang nyaman dengan komunitas yang
                        kuat dan
                        keindahan alam yang asri. Dikenal dengan infrastruktur yang baik, jalan beraspal, dan lingkungan
                        hijau, RW
                        04 memiliki fasilitas umum seperti posyandu, balai RW, dan tempat ibadah yang mendukung
                        kehidupan warganya.
                        Komunitas di sini aktif dalam berbagai kegiatan sosial dan keagamaan, mempererat hubungan
                        antarwarga. Akses
                        pendidikan dan kesehatan juga memadai dengan beberapa sekolah dan puskesmas di sekitar.
                        Lokasinya strategis
                        dengan akses mudah ke pusat kelurahan dan fasilitas penting, menjadikannya tempat ideal untuk
                        tinggal.
                    </p>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/image/jatimulyo.jpg') }}" alt="Jatimulyo" class="img-fluid mt-5">
                </div>
            </div>
            <!-- <button class="btn btn-primary">Selengkapnya</button> -->
        </div>

        <!-- Statistics Section -->

        <div class="container" id="col-4">
            <div class="row justify-content-center">
                <div class="card col-md-12">
                    <div class="row text-center">
                        <div class="col-md-4">
                            <h3 class="font-weight-bold">2000</h3>
                            <p>Jumlah Warga</p>
                        </div>
                        <div class="col-md-4">
                            <h3 class="font-weight-bold">400</h3>
                            <p>Jumlah Keluarga</p>
                        </div>
                        <div class="col-md-4">
                            <h3 class="font-weight-bold">3</h3>
                            <p>Jumlah RT</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Structure Section -->
        <div class="my-5 text-center position-relative">
            <h2 style="font-weight: 550; color: #0b7077;">Struktur</h2>
            <div class="row justify-content-center">
                <div class="col-md-3 p-1">
                    <div class="m-1 card p-0 m-0" style="background-color:#D2E6E4;">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/image/profile.jpg') }}" alt="Ketua RW" class="img-fluid"
                                style="object-fit: cover; height: 300px; width: 100%;" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Ketua RW</h5>
                            <p class="card-text">Don Pollo</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-1">
                    <div class="m-1 card p-0 m-0" style="background-color:#D2E6E4;">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/image/profile.jpg') }}" alt="Ketua RT" class="img-fluid"
                                style="object-fit: cover; height: 300px; width: 100%;" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Ketua RT</h5>
                            <p class="card-text">Don Pollo</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-1">
                    <div class="m-1 card p-0 m-0" style="background-color:#D2E6E4;">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/image/profile.jpg') }}" alt="Sekretaris RW" class="img-fluid"
                                style="object-fit: cover; height: 300px; width: 100%;" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Sekretaris RW</h5>
                            <p class="card-text">Don Pollo</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-1">
                    <div class="m-1 card p-0 m-0" style="background-color:#D2E6E4;">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/image/profile.jpg') }}" alt="Sekretaris RT" class="img-fluid"
                                style="object-fit: cover; height: 300px; width: 100%;" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Sekretaris RT</h5>
                            <p class="card-text">Don Pollo</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-1">
                    <div class="m-1 card p-0 m-0" style="background-color:#D2E6E4;">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/image/profile.jpg') }}" alt="Bendahara RW" class="img-fluid"
                                style="object-fit: cover; height: 300px; width: 100%;" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Bendahara RW</h5>
                            <p class="card-text">Don Pollo</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 p-1">
                    <div class="m-1 card p-0 m-0" style="background-color:#D2E6E4;">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <img src="{{ asset('assets/image/profile.jpg') }}" alt="Bendahara RT" class="img-fluid"
                                style="object-fit: cover; height: 300px; width: 100%;" />
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Bendahara RT</h5>
                            <p class="card-text">Don Pollo</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <button class="btn btn-primary rounded-circle left-button"><svg xmlns="http://www.w3.org/2000/svg" width="16"
          height="16" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
        </svg></button>
      <button class="btn btn-primary rounded-circle right-button"><svg xmlns="http://www.w3.org/2000/svg" width="16"
          height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd"
            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
        </svg></button> -->
        </div>

        <!-- Agenda Section -->

        <div class="text-center my-5">
            <h2 style="font-weight: 550; color: #0b7077;">Agenda Kegiatan</h2>
            <div id="agendaCarousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('assets/image/sosialisasi.jpg') }}" class="d-block w-100" alt="Agenda">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="caption-card">
                                <h5>Sosialisasi pembinaan warga</h5>
                                <p>12 Desember 2077</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/image/rapat.jpg') }}" class="d-block w-100" alt="Agenda">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="caption-card">
                                <h5>Sosialisasi pembinaan warga</h5>
                                <p>13 Desember 2077</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('assets/image/gotong.jpeg') }}" class="d-block w-100" alt="Agenda">
                        <div class="carousel-caption d-none d-md-block">
                            <div class="caption-card">
                                <h5>Sosialisasi pembinaan warga</h5>
                                <p>14 Desember 2077</p>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#agendaCarousel" role="button" data-slide="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-chevron-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0" />
                    </svg>
                </a>
                <a class="carousel-control-next" href="#agendaCarousel" role="button" data-slide="next">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-chevron-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </a>
            </div>
        </div>

        <!-- <button class="btn btn-primary mt-3">Selengkapnya</button> -->
    </div>

    <!-- <div class="text-center my-5">
      <h3>Agenda Kegiatan</h3>
      <div class="row agenda">
        <div class="col-md-4">
          <img src="https://via.placeholder.com/300x200" alt="Agenda" />
          <h5>Sosialisasi pembinaan warga</h5>
          <p>12 Desember 2077</p>
        </div>
        <div class="col-md-4" style="">
          <img src="https://via.placeholder.com/300x200" alt="Agenda" />
          <h5>Sosialisasi pembinaan warga</h5>
          <p>12 Desember 2077</p>
        </div>
        <div class="col-md-4">
          <img src="https://via.placeholder.com/300x200" alt="Agenda" />
          <h5>Sosialisasi pembinaan warga</h5>
          <p>12 Desember 2077</p>
        </div>
      </div>
      <button class="btn btn-primary">Selengkapnya</button>
    </div> -->
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
