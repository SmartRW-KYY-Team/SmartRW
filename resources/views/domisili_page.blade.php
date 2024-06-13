@extends('layouts_landing.app')
<!-- Main -->
@section('content')
    @include('layouts_base.app')

    <section>
        <!-- Form Section -->
        <div class="form-section">
            <div class=" container my-5">
                <div class=" text-center pt-5">
                    <h1>Surat Keterangan Domisili</h1>
                </div>
                <div class="card mx-auto shadow py-4" style="max-width: 800px;">
                    <div class="card-header py-3" style="background-color: #4154f1;">
                        <h5 class="card-title py-3 text-center" style="color: white ">Ajukan Surat Keterangan Domisili Anda</h5>
                    </div>
                    <div class="card-body py-4">
                        <form action="{{ route('domisili_page_create') }}" method="POST">
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
@endsection

@push('js')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    @include('sweetalert::alert')
@endpush
