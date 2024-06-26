@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <a href="{{ route('bansos.process') }}" class="btn btn-md btn-success mt-1 me-2"> Proses</a>
                <a href="{{ route('bansos.create') }}" class="btn btn-md btn-primary mt-1">+ Tambah</a>
            </div>
        </div>
        <div class="card-body">
            {!! $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped'], true) !!}
        </div>
    </div>
@endsection

@push('scripts')
    {!! $dataTable->scripts() !!}
@endpush
