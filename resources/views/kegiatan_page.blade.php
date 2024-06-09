<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMARTRW - Agenda Kegiatan</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/style_kegiatan.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">
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
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Keuangan
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item " href="{{ route('keuanganWarga.rt.index') }}">RT</a>
                        <a class="dropdown-item" href="{{ route('keuanganWarga.rw.index') }}">RW</a>
                    </div>
                </li>
                <li class="nav-item active">
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
                    <h1 class="display-4">Agenda Kegiatan</h1>
                    <p class="lead">Lihat agenda kegiatan secara langsung</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Section -->
    <div class="form-section">
        <div class=" container my-5">
            <div class="card mx-auto" style="max-width: 1000px;">
                <div class="card-header">
                    <h5 class="card-title" style="background-color: #0b7077;">Agenda Kegiatan</h5>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <select id="filter-month" class="form-control">
                                @foreach (range(1, 12) as $month)
                                    <option value="{{ $month }}" {{ $month == date('m') ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $month, 10)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
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
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered table-sm"
                            id="kegiatanwarga-table">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">RT</th>
                                    <th scope="col">RW</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="showModalDetail" tabindex="-1" aria-labelledby="showModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showModalLabel">Data Kegiatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close">&times;</button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Kegiatan</th>
                            <td id="nama"></td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td id="deskripsi"></td>
                        </tr>
                        <tr>
                            <th>Tanggal Kegiatan</th>
                            <td id="tanggal_kegiatan"></td>
                        </tr>
                        <tr>
                            <th>RT</th>
                            <td id="rt_id"></td>
                        </tr>
                        <tr>
                            <th>RW</th>
                            <td id="rw_id"></td>
                        </tr>
                        <tr>
                            <th>Lampiran</th>
                            <td><img alt="lampiran" id="lampiran" name="lampiran"
                                    style="max-width: 400px; height: 200px"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
                <a href="https://wa.me/628110992160"
                    style="color: #25D366; text-decoration: underline;">+6282110992160</a>
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
            var table = $('#kegiatanwarga-table').DataTable({
                responsive: true,
                autoWidth: false,
                scroller: true,
                scrollX: true,
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{!! route('kegiatan_page') !!}',
                    data: function(d) {
                        d.filter_month = $("#filter-month").val();
                        d.filter_year = $("#filter-year").val();
                    }
                },
                columns: [{
                        data: 'No',
                        name: 'No'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'tanggal_kegiatan',
                        name: 'tanggal_kegiatan'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'rt.nama',
                        name: 'RT'
                    },
                    {
                        data: 'rw.nama',
                        name: 'RW'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

            $('#filter-button').click(function() {
                table.ajax.reload(null, false);
            });
        });
        $('#kegiatanwarga-table').on('click', '.showButtonDetail', function() {
            var modal = $('#showModalDetail');
            modal.find('#nama').text($(this).data('nama'));
            modal.find('#deskripsi').text($(this).data('deskripsi'));
            modal.find('#tanggal_kegiatan').text($(this).data('tanggal'));
            modal.find('#rt_id').text($(this).data('rt'));
            modal.find('#rw_id').text($(this).data('rw'));
            modal.find('#lampiran').attr('src', $(this).data('lampiran'));
            modal.modal('show');
        });
    </script>
</body>

</html>
