@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <h4 class="card-title">Keuangan RW</h4>
            <div class="card-tools ms-auto">
                <a href="{{ url('kategori/create') }}" class="btn btn-md btn-primary mt-1" data-bs-target="#tambahModal" data-bs-toggle="modal">+ Tambah</a>
            </div>
        </div>
        <div class="card-body">
            {{ $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped']) }}
        </div>
    </div>
    @include('keuanganrw.edit')
    @include('keuanganrw.delete')
    @include('keuanganrw.create')
@endsection

@push('scripts')
    <script>
        $(document).on('click', '.deleteButton', function(e) {
            var id = $(this).data('id');
            $('#deleteModal').modal('show');
            $("#deleteKeuanganModalText").html("Apakah Anda yakin ingin menghapus data ?");
            $('#deleteForm').attr('action', "{{ route('keuanganrw.destroy', ['id' => 'id_keuanganrw']) }}".replace('id_keuanganrw', id));
        });

        $(document).on('click', '.editKeuanganButton', function(e) {
            var id_edit = $(this).data('id');
            $.ajax({
                url: `/keuanganrw/${id_edit}/edit`,
                method: 'GET',
                success: function(data) {
                    $('#keuanganrwId').val(data.id);
                    $('#edit-tipe').val(data.tipe);
                    $('#edit-tanggal').val(data.tanggal);
                    $('#edit-keterangan').val(data.keterangan);
                    $('#edit-jumlah').val(data.jumlah);
                    $('#edit-rt_id').val(data.rt_id);

                    $('#updateKeuanganForm').attr('action', "{{ route('keuanganrw.update', ['id' => 'id_edit']) }}".replace('id_edit', id_edit));

                    $('#EditKeuanganModal').modal('show');
                }
            });
        });

        $(document).ready(function() {
            $('#EditKeuanganModal').on('hidden.bs.modal', function() {
                $(this).find('form').trigger('reset');
            });
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush