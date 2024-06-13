@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex">
        </div>
        <div class="card-body">
            {{ $dataTable->table(['width' => '100%', 'class' => 'table table-bordered table-striped']) }}
        </div>
    </div>
    <!-- Modal Detail -->
    <div class="modal fade" id="viewRTModal" tabindex="-1" aria-labelledby="viewRTModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewRTModalLabel">Detail RT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>RT</th>
                            <td id="detail-rt"></td>
                        </tr>
                        <tr>
                            <th>Ketua</th>
                            <td id="detail-ketua"></td>
                        </tr>
                        <tr>
                            <th>Sekretaris</th>
                            <td id="detail-sekretaris"></td>
                        </tr>
                        <tr>
                            <th>Bendahara</th>
                            <td id="detail-bendahara"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('body').on('click', '.showDetailRTButton', function(e) {
            var id_detail = $(this).data('id');
            $('#viewRTModal').modal('show');
            $.ajax({
                url: `/rt/${id_detail}/show`,
                method: 'GET',
                success: function(data) {
                    // Populate modal fields with data received from the server
                    $('#detail-rt').text(data.rt);
                    $('#detail-ketua').text(data.ketua);
                    $('#detail-sekretaris').text(data.sekretaris);
                    $('#detail-bendahara').text(data.bendahara);
                },
                error: function(err) {
                    console.error(err);
                    // Handle error
                }
            });
        });
    </script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
