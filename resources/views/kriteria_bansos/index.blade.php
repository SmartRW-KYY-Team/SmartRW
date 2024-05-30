@extends('layouts.app')
@section('content')
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
            <thead>
                <tr>
                    <th class="col-md-1">Nama Kriteria</th>
                    <th>Pendapatan</th>
                    <th>Kendaraan</th>
                    <th>Jenis Lantai</th>
                    <th>Kondisi Dinding</th>
                    <th>Kondisi Atap</th>
                    <th>Tanggungan</th>
                    <th>Listrik</th>
                    <th>Luas Tanah</th>
                    <th>Luas Bangunan</th>
                    <th>Bobot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->nama_kriteria }}</td>
                        <td>{{ $d->pendapatan }}</td>
                        <td>{{ $d->kendaraan }}</td>
                        <td>{{ $d->jenis_lantai }}</td>
                        <td>{{ $d->kondisi_dinding }}</td>
                        <td>{{ $d->kondisi_atap }}</td>
                        <td>{{ $d->tanggungan }}</td>
                        <td>{{ $d->listrik }}</td>
                        <td>{{ $d->luas_tanah }}</td>
                        <td>{{ $d->luas_bangunan }}</td>
                        <td>
                            {{ $d->bobot }}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    <p>Consistency Index (CI): {{ $consistency['CI'] }}</p>
    <p>Consistency Ratio (CR): {{ $consistency['CR'] }}</p>
@endsection
@push('scripts')
@endpush
