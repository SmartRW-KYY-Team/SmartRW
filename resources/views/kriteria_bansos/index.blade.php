@extends('layouts.app')
@section('content')
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
                        <a href="" class="btn-sm btn-secondary">Detail</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
@push('scripts')
@endpush
