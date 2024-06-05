<!-- Modal Detail Keluarga -->
<div class="modal fade" id="viewDetailKeluargaModal" tabindex="-1" aria-labelledby="viewDetailKeluargaModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="viewDetailKeluargaModalLabel">Detail Keluarga</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nomor Kartu Keluarga</th>
                    <td id="detail-nokk"></td>
                </tr>
                <tr>
                    <th>Kepala Keluarga</th>
                    <td id="detail-kepala_keluarga"></td>
                </tr>
                <tr>
                    <th>RT</th>
                    <td id="detail-rt"></td>
                </tr>
                <tr>
                    <th>RW</th>
                    <td id="detail-rw"></td>
                </tr>
                <tr>
                    <th>Anggota Keluarga</th>
                    <td id="detail-anggota_keluarga">
                        <ul id="anggota-keluarga-list">
                            <!-- List anggota keluarga akan diisi dengan JavaScript -->
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
    </div>
</div>
</div>
