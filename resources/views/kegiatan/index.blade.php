@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
            <div class="card-tools ms-auto">
                <a href="{{ route('kegiatan.create') }}" class="btn btn-md btn-primary mt-1">+ Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success"> {{ session('success') }} </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger"> {{ session('error') }} </div>
            @endif
            {{ $dataTable->table() }}
        </div>
    </div>
    <!-- Modal Hapus -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <label id="deleteModalText">
                        Apakah Anda yakin ingin menghapus data ini?
                    </label>
                </div>
                <div class="modal-footer">
                    <form id="deleteForm" method="POST">
                        @csrf
                        @method('DELETE')
                        {{-- @method('DELETE') --}}
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('kegiatan.show')
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    <script>
        $('body').on('click', '.deleteButton', function(e) {
            var id = $(this).data('id');
            $('#deleteModal').modal('show');
            $("#deleteModalText").html("Apakah Anda yakin ingin menghapus data Kegiatan Ini ?");
            $('#deleteForm').attr('action', "{{ route('kegiatan.destroy', ['id' => 'id_kegiatan']) }}".replace(
                'id_kegiatan',
                id));
        });
        $(document).on('click', '.showButtonDetail', function(e) {
            $('#showModalDetail').modal('show');
            var id = $(this).data('id');
            var rw = $(this).data('rw');
            var rt = $(this).data('rt');
            $.ajax({
                url: `/kegiatan/${id}/show`,
                method: 'GET',
                success: function(data) {
                    $('#nama').text(data.nama); // Menggunakan .text() untuk elemen <p>
                    $('#deskripsi').text(data.deskripsi); // Menggunakan .val() untuk textarea
                    $('#tanggal_kegiatan').text(data
                        .tanggal_kegiatan); // Menggunakan .text() untuk elemen <p>
                    $('#rt_id').text(rt); // Menggunakan .text() untuk elemen <p>
                    $('#rw_id').text(rw); // Menggunakan .text() untuk elemen <p>
                    $('#lampiran').attr('src', data.lampiran);
                    $('#lampiran1').text(data.lampiran); // Menggunakan .attr() untuk elemen <img>
                }
            });
        });

        $(document).ready(function() {
            $('#showModal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });
        });

        fetchImage();
    </script>
@endpush
