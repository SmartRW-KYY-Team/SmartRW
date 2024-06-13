@extends('layouts_landing.app')

@section('content')
    @include('layouts_base.app')
    <section>

        <div class="pengaduan text-center pt-5">
            <h1>Pengaduan</h1>
        </div>

        <div class="form-section ">
            <div class="container my-5">
                <div class="card mx-auto shadow" style="max-width: 70%; ">
                    <div class="card-header py-3" style="background-color: #4154f1; color: white; border-radius: 10px 10px 0 0;">
                        <h5 class="card-title py-3 text-center">Sampaikan Laporan Pengaduan Anda</h5>
                    </div>
                    <div class="card-body py-4">
                        <form action="{{ route('pengaduan_page_create') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="keluhan" class="required">Keluhan</label>
                                <input type="text" class="form-control" id="keluhan" name="keluhan"
                                    placeholder="Masukkan keluhan" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal"class="required">Tanggal Kejadian</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal_kejadian" required>
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
                                <label for="lampiran" class="required">Lampiran</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control" id="lampiran" name="lampiran" required>
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn"
                                    style="background-color: #4154f1; color: white;">Laporkan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Statistics Section -->
        <div class="container my-5">
            <div class="card shadow" style="max-width: 70%; margin: 0 auto;">
                <div class="card-body" style="background-color: #4154f1; color: white; border-radius: 10px;">
                    <h3 class="card-title text-center py-3">Jumlah Laporan Dilaporkan</h3>
                    <h1 class="text-center" style="font-weight: 550; color: white">{{ $jumlahPengaduan }}</h1>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @include('sweetalert::alert')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggal').setAttribute('max', today);
        });
    </script>
@endpush
