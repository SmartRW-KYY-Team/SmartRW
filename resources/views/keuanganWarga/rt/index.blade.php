@extends('layouts_landing.app')
<!-- Main -->
@section('content')
    @include('layouts_base.app')
    <section>
        <div class="container py-5">
            <div class="title text-center pt-5">
                <h1>Keuangan Rukun Tetangga</h1>
            </div>
            <div class="card my-5 shadow">
                <div class="card-header">
                    <h5 class="card-title" text-color="black">Lihat Laporan Keuangan RT</h5>
                </div>
                <div class="card-body">
                    <div class="dropdown mb-3">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            RT 1
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="rt-dropdown">
                            <li><a class="dropdown-item active" href="#" data-rt-id="1">RT 1</a></li>
                            <li><a class="dropdown-item" href="#" data-rt-id="2">RT 2</a></li>
                            <li><a class="dropdown-item" href="#" data-rt-id="3">RT 3</a></li>
                        </ul>
                    </div>
                    <div class="row mb-3 mt-3">
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
                                            id="monthly-income">{{ number_format($monthlyIncome, 0, ',', '.') }}</span></h5>
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
                            <select id="filter-month" class="form-select">
                                @foreach (range(1, 12) as $month)
                                    <option value="{{ $month }}" {{ $month == date('m') ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $month, 10)) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select id="filter-year" class="form-select">
                                @foreach (range(date('Y'), date('Y') - 5) as $year)
                                    <option value="{{ $year }}" {{ $year == date('Y') ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button id="filter-button" class="btn btn-primary w-100 "
                                style="background-color: #4154f1";>Filter</button>
                        </div>
                    </div>
                    <table class="table table-bordered" id="keuanganRT-table">
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
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            var table = $('#keuanganRT-table').DataTable({
                responsive: true,
                autoWidth: false,
                scroller: true,
                scrollX: true,
                serverSide: true,
                processing: true,
                ajax: {
                    url: '{!! route('keuanganWarga.rt.index') !!}',
                    data: function(d) {
                        d.filter_month = $("#filter-month").val();
                        d.filter_year = $("#filter-year").val();
                        d.rt_id = $("#rt-dropdown .dropdown-item.active").data('rt-id');
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

            $('#rt-dropdown .dropdown-item').click(function(e) {
                e.preventDefault();
                $('#rt-dropdown .dropdown-item').removeClass('active');
                $(this).addClass('active');
                $('#dropdownMenuButton').text($(this).text());
                table.ajax.reload(null, false);
            });
        });
    </script>
@endpush
