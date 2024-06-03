@extends('layouts.app')
@section('content')
    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped table-hover table-sm" id="table_level">
            <thead>
                <tr>
                    <th class="col-md-1">Ranking</th>
                    <th>No KK</th>
                    <th>Appraisal Score</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($data as $d)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $d->keluarga->nokk }}</td>
                        <td>{{ $d->AS }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
@push('scripts')
@endpush
