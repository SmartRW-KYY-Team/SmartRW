@extends('layouts_landing.app')
<!-- Main -->
@section('content')
    @include('layouts_base.app')

    <section>
        <div class="form-section">
            <div class=" container my-5">
                <div class="sktm text-center py-5">
                    <h1>Surat Keterangan Tidak Mampu</h1>
                </div>
                <div class="card mx-auto" style="max-width: 800px;">
                    <div class="card-header py-4" style="background-color: #4154f1 ">
                        <h5 class="card-title text-center text-white">Form Pengajuan Surat Keterangan Tidak Mampu (SKTM)</h5>
                    </div>
                    <div class="card-body pt-4 shadow">
                        <form action="{{ route('sktm_page_create') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nikPemohon" class="required">Nik</label>
                                <input type="number" class="form-control" id="nikPemohon" name="nikPemohon"
                                    placeholder="Masukkan NIK pemohon" required>
                            </div>
                            <div class="form-group">
                                <label for="namaPemohon" class="required">Nama</label>
                                <input type="text" class="form-control" id="namaPemohon" name="namaPemohon"
                                    placeholder="Masukkan nama pemohon" required>
                            </div>
                            <div class="form-group">
                                <label for="namaOrtu" class="required">Nama Orang Tua</label>
                                <input type="text" class="form-control" id="namaOrtu" name="namaOrtu"
                                    placeholder="Masukkan nama orang tua" required>

                            </div>
                            <div class="form-group">
                                <label for="pekerjaan" class="required">Pekerjaan Orang Tua</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                    placeholder="Masukkan pekerjaan orang tua" required>
                            </div>
                            <div class="form-group">
                                <label for="gaji" class="required">Gaji Orang Tua</label>
                                <input type="number" class="form-control" id="gaji" name="gaji"
                                    placeholder="Masukkan gaji orang tua" required>
                            </div>
                            <div class="form-group">
                                <label for="rt" class="required">RT</label>
                                <select class="form-control" id="rt" name="rt" required>
                                    <option value="" selected disabled>Pilih RT</option>
                                    @foreach ($rt as $rts)
                                        <option value="{{ $rts->id_rt }}">{{ $rts->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rw" class="required">RW</label>
                                <select class="form-control" name="rw" id="rw" required>
                                    @foreach ($rw as $rws)
                                        <option value="{{ $rws->id_rw }}" selected>{{ $rws->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="required">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan"
                                    placeholder="Masukkan keterangan" required>
                            </div>
                            <div>
                                <button type="submit" class="btn"
                                    style="background-color: #4154f1; color: white;">Ajukan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
