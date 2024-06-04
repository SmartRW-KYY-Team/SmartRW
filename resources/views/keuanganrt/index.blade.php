@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-header d-flex">
            <h4 class="card-title">Keuangan RT</h4>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">  
                    <div class="card bg-white">
                        <div class="card-header bg-white">
                            <i class="bi bi-cash fs-2"></i> <span class="fw-bold">Saldo Saat Ini :</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rp {{ number_format($currentBalance, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-white">
                        <div class="card-header bg-white">
                            <i class="bi bi-arrow-down-circle-fill text-success fs-2"></i> <span class="text-success fw-bold">Uang Masuk Bulan Ini :</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-success">Rp {{ number_format($monthlyIncome, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-white">
                        <div class="card-header bg-white">
                            <i class="bi bi-arrow-up-circle-fill text-danger fs-2"></i> <span class="text-danger fw-bold">Uang Keluar Bulan Ini :</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-danger">Rp {{ number_format($monthlyExpense, 0, ',', '.') }}</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header d-flex">
                <div class="card-tools ms-auto">
                    <a href="{{ url('keuangan.create') }}" class="btn btn-md btn-primary mt-1" data-bs-target="#tambahModal"
                        data-bs-toggle="modal">+ Tambah</a>
                </div>
            </div>
            {{ $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped table-hover']) }}
        </div>
    </div>
    @include('keuanganrt.edit')
    @include('keuanganrt.delete')
    @include('keuanganrt.create')
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.deleteButton', function(e) {
            var id = $(this).data('id');
            $('#deleteModal').modal('show');
            $("#deleteKeuanganModalText").html("Apakah Anda yakin ingin menghapus data ?");
            $('#deleteForm').attr('action', "{{ route('keuanganrt.destroy', ['id' => 'id_keuanganrt']) }}".replace(
                'id_keuanganrt', id));
        });

        $(document).on('click', '.editKeuanganButton', function(e) {
            var id_edit = $(this).data('id');
            $.ajax({
                url: `/keuanganrt/${id_edit}/edit`,
                method: 'GET',
                success: function(data) {
                    $('#keuanganrtId').val(data.id);
                    $('#edit-tipe').val(data.tipe);
                    $('#edit-tanggal').val(data.tanggal);
                    $('#edit-keterangan').val(data.keterangan);
                    $('#edit-jumlah').val(data.jumlah);
                    $('#edit-rt_id').val(data.rt_id);

                    $('#updateKeuanganForm').attr('action',
                        "{{ route('keuanganrt.update', ['id' => 'id_edit']) }}".replace('id_edit',
                            id_edit));

                    $('#EditKeuanganModal').modal('show');
                }
            });
        });

        $(document).ready(function() {
            $('#EditKeuanganModal').on('hidden.bs.modal', function() {
                $(this).find('form').trigger('reset');
            });

            $('#tanggal').val(new Date().toISOString().split('T')[0]);
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
    