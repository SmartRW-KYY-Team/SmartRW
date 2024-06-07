<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTRW - Laporan Keuangan RW</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style_keuangan_rw.css') }}">
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
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('landing_page') }}">Beranda</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('pengaduan_page') }}">Pengaduan</a>
                </li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Keuangan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item " href="{{ route('keuanganWarga.rt.index') }}">RT</a>
                        <a class="dropdown-item active" href="{{ route('keuanganWarga.rw.index') }}">RW</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kegiatan_page') }}">Agenda Kegiatan</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Pengajuan Surat
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item " href="{{ route('sktm_page') }}">SKTM</a>
                        <a class="dropdown-item" href="{{ route('cek_sktm_page') }}">Status SKTM</a>
                        <a class="dropdown-item" href="{{ route('domisili_page') }}">Domisili</a>
                        <a class="dropdown-item" href="{{ route('cek_domisili_page') }}">Status Domisili</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger" href="{{ route('login') }} ">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="display-4">Laporan Keuangan RW</h1>
                    <p class="lead">
                        Lihat laporan keuangan RW secara langsung
                    </p>
                </div>

            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="container mt-4">
        <div class="card mb-3">
            <div class="card-header">
                <h5 class="card-title" style="background-color: #0b7077;">Lihat Laporan Keuangan RW</h5>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="card bg-white">
                            <div class="card-header bg-white">
                                <i class="bi bi-cash fs-2"></i> <span class="fw-bold">Saldo Saat Ini :</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-dark" style="background-color: white;">Rp <span
                                        id="current-balance">{{ number_format($currentBalance, 0, ',', '.') }}</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-white">
                            <div class="card-header bg-white">
                                <i class="bi bi-arrow-down-circle-fill text-success fs-2"></i> <span
                                    class="text-success fw-bold">Uang Masuk Bulan Ini :</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-success" style="background-color: white;">Rp <span
                                        id="monthly-income">{{ number_format($monthlyIncome, 0, ',', '.') }}</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card bg-white">
                            <div class="card-header bg-white">
                                <i class="bi bi-arrow-up-circle-fill text-danger fs-2"></i> <span
                                    class="text-danger fw-bold">Uang Keluar Bulan Ini :</span>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title text-danger" style="background-color: white;">Rp <span
                                        id="monthly-expense">{{ number_format($monthlyExpense, 0, ',', '.') }}</span>
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <select id="filter-month" class="form-control">
                            @foreach (range(1, 12) as $month)
                                <option value="{{ $month }}" {{ $month == date('m') ? 'selected' : '' }}>
                                    {{ date('F', mktime(0, 0, 0, $month, 10)) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select id="filter-year" class="form-control">
                            @foreach (range(date('Y'), date('Y') - 5) as $year)
                                <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>
                                    {{ $year }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button id="filter-button" class="btn btn-primary">Filter</button>
                    </div>
                </div>
                <table class="table table-bordered" id="keuanganRW-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Tipe</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#keuanganRW-table').DataTable({
                responsive: true,
                autoWidth: false,
                scroller: true,
                scrollX: true,
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{!! route('keuanganWarga.rw.index') !!}',
                    data: function(d) {
                        d.filter_month = $("#filter-month").val();
                        d.filter_year = $("#filter-year").val();
                        d.rw_id = $("#rw-dropdown .dropdown-item.active").data('rw-id');
                    }
                },
                columns: [{
                        data: 'No',
                        name: 'No'
                    },
                    {
                        data: 'tanggal',
                        name: 'tanggal'
                    },
                    {
                        data: 'jumlah',
                        name: 'jumlah'
                    },
                    {
                        data: 'tipe',
                        name: 'tipe'
                    },
                    {
                        data: 'keterangan',
                        name: 'keterangan'
                    }
                ]
            });

            $('#filter-button').click(function() {
                table.ajax.reload(null, false);
            });

            $('#rw-dropdown .dropdown-item').click(function(e) {
                e.preventDefault();
                $('#rw-dropdown .dropdown-item').removeClass('active');
                $(this).addClass('active');
                $('#dropdownMenuButton').text($(this).text());
                table.ajax.reload(null, false);
            });
        });
    </script>

</body>

</html>
