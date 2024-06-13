@extends('layouts_landing.app')
@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section">

        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1 data-aos="fade-up">Selamat Datang</h1>
                    <p data-aos="fade-up" data-aos-delay="100"> Di Website RW 04 Kelurahan Jatimulyo, Kecamatan
                        Lowokwaru, Kabupaten Malang</p>
                    <div class="d-flex flex-column flex-md-row" data-aos="fade-up" data-aos-delay="200">
                        <a href="#about" class="btn-get-started">Mulai <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
                    <img src="{{ asset('assets/image/jumbotron.png') }}" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content">
                        <h2>RW 04 Jatimulyo</h2>
                        <hr
                            style="height: 3px; width: 10%; background-color: #5d6df3; border: none; margin-left:0; margin-bottom:20px">
                        <p style="text-align: justify;">
                            Wilayah yang nyaman dengan komunitas yang kuat dan keindahan alam yang asri. Dikenal dengan
                            infrastruktur yang baik, jalan beraspal, dan lingkungan hijau, RW 04 memiliki fasilitas umum
                            seperti posyandu, balai RW, dan tempat ibadah yang mendukung kehidupan warganya.
                        </p>
                        <div class="text-center text-lg-start">
                            <a
                                href="https://radarmalang.jawapos.com/kota-malang/811069483/murbei-jadi-ikon-rw-04-kelurahan-jatimulyo">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="https://statik.tempo.co/data/2018/07/01/id_715774/715774_720.jpg" class="img-fluid"
                        alt="">
                </div>

            </div>
        </div>

    </section><!-- /About Section -->

    <!-- Values Section -->
    <section id="valuess" class="valuess section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Agenda</h2>
            <p>Agenda Kegiatan RW 4<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                @foreach ($agenda as $agnd)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="card" style="padding: 0px !important;">
                            <img src="{{ asset($agnd->lampiran) }}" class="img-fluid" alt="agenda kegiatan">
                            <h3>{{ $agnd->nama }}</h3>
                            <p>{{ $agnd->deskripsi }}
                            </p>
                            <p>
                                Tanggal : {{ $agnd->tanggal_kegiatan }}
                            </p>
                            <button class="btn btn-primary btn-sm">Lihat Detail</button>
                        </div> --}}
                        <div class="card custom-card" style="width: 100%;">
                            <img src="{{ asset($agnd->lampiran) }}" class="img-fluid" alt="agenda kegiatan">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $agnd->nama }}</h5>
                                <p class="card-text">{{ $agnd->deskripsi }}</p>
                                <p>
                                    Tanggal : {{ $agnd->tanggal_kegiatan }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>

    </section><!-- /Values Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $user }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Jumlah Warga</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="fas fa-users color-orange flex-shrink-0" style="color: #ee6c20;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $keluarga }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Jumlah Keluarga</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-people color-green flex-shrink-0" style="color: #15be56;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $jumlahRT }}"
                                data-purecounter-duration="1" class="purecounter"></span>
                            <p>Jumlah RT</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        {{-- <i class="bi bi-people color-green flex-shrink-0" style="color: #15be56;"></i> --}}
                        <i class="bi bi-person-gear color-green flex-shrink-0" style="color: #15be56;"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="12" data-purecounter-duration="1"
                                class="purecounter"></span>
                            <p>Jumlah Pengurus</p>
                        </div>
                    </div>
                </div><!-- End Stats Item -->

            </div>

        </div>

    </section><!-- /Stats Section -->

    <!-- Alt Features Section -->
    <section id="alt-features" class="alt-features section">

        <div class="container">

            <div class="row gy-5">

                <div class="col-xl-7 d-flex order-2 order-xl-1" data-aos="fade-up" data-aos-delay="200">
                    <div class="row align-self-center gy-5">
                        <h2>
                            Nikmati Manfaat Fitur Kami Yang Sudah Terintegrasi Dengan RT dan RW setempat
                        </h2>

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-easel"></i>
                            <div>
                                <h4>Tampilan Yang Mudah</h4>
                                <p>Tampilan yang mudah dipahami oleh pengguna sehingga nyaman saat digunakan</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-info-circle"></i>
                            <div>
                                <h4>Informasi Terkini</h4>
                                <p>Dapatkan informasi terkini mengenai semua hal yang ada di lingkungan RT/RW</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-file-earmark-text"></i>
                            <div>
                                <h4>Mempermudah Administrasi</h4>
                                <p>Pengurusan administrasi yang mudah untuk warga</p>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6 icon-box">
                            <i class="bi bi-lightning-charge"></i>
                            <div>
                                <h4>Pelayanan yang Cepat</h4>
                                <p>Pelayanan yang cepat untuk mengurus semua kebutuhan di lingkungan RT/RW</p>
                            </div>
                        </div><!-- End Feature Item -->

                    </div>
                </div>

                <div class="col-xl-5 d-flex align-items-center order-1 order-xl-2" data-aos="fade-up"
                    data-aos-delay="100">
                    <img src="{{ asset('assets_landing/assets/img/alt-features.png') }}" class="img-fluid"
                        alt="">
                </div>

            </div>


        </div>

    </section><!-- /Alt Features Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Rukun Warga</h2>
            <p>Struktur Rukun Warga</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/ketua_rw.jpg') }}" alt="img-fluid"
                                style="width:100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rw->ketuaRW->nama }}</h4>
                            <span>Ketua RW</span>
                            <p>Dengan pengalaman lebih dari 10 tahun dalam memimpin berbagai organisasi masyarakat,
                                {{ $rw->ketuaRW->nama }} berkomitmen untuk meningkatkan kualitas hidup warga RW. Beliau
                                selalu berusaha menjalin hubungan yang harmonis dan memastikan kesejahteraan serta keamanan
                                lingkungan.</p>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/sekretaris_rw.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rw->sekretarisRW->nama }}</h4>
                            <span>Sekretaris RW</span>
                            <p>{{ $rw->sekretarisRW->nama }} dikenal dengan ketelitian dan kecakapannya dalam administrasi.
                                Beliau bertanggung jawab atas pengelolaan dokumen dan korespondensi RW, serta selalu
                                memastikan informasi tersampaikan dengan baik kepada warga.</p>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/bendahara_rw.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rw->bendaharaRW->nama }}</h4>
                            <span>Bendahara RW</span>
                            <p>{{ $rw->bendaharaRW->nama }} adalah sosok yang jujur dan bertanggung jawab dalam mengelola
                                keuangan RW. Dengan pengalamannya di bidang keuangan, beliau memastikan transparansi dan
                                akuntabilitas dalam setiap transaksi keuangan, serta memprioritaskan kebutuhan warga.</p>
                        </div>
                    </div>
                </div><!-- End Team Member -->

                {{-- <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                data-aos-delay="400">
                <div class="team-member">
                    <div class="member-img">
                        <img src="{{ asset('assets_landing/assets/img/team/team-4.jpg') }}" class="img-fluid"
                            alt="">
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                    <div class="member-info">
                        <h4>Amanda Jepson</h4>
                        <span>Accountant</span>
                        <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut
                            aliquid doloremque ut possimus ipsum officia.</p>
                    </div>
                </div>
            </div><!-- End Team Member --> --}}

            </div>

            <div class="owl-carousel row gy-4 mt-5">
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/ketua_rt_1.jpg') }}" alt="img-fluid"
                                style="width:100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rt[0]->ketuaRT->nama }}</h4>
                            <span>Ketua RT 1</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/sekretaris_rt_1.jpg') }}" alt="img-fluid"
                                style="width:100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rt[0]->sekretarisRT->nama }}</h4>
                            <span>Sekretaris RT 1</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/bendahara_rt_1.jpg') }}" alt="img-fluid"
                                style="width:100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rt[0]->bendaharaRT->nama }}</h4>
                            <span>Bendahara RT 1</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/ketua_rt_2.jpg') }}" alt="img-fluid"
                                style="width:100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rt[1]->ketuaRT->nama }}</h4>
                            <span>Ketua RT 2</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/sekretaris_rt_2.jpg') }}" alt="img-fluid"
                                style="width:100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rt[1]->sekretarisRT->nama }}</h4>
                            <span>Sekretaris RT 2</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/bendahara_rt_2.jpg') }}" alt="img-fluid"
                                style="width:100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rt[1]->bendaharaRT->nama }}</h4>
                            <span>Bendahara RT 2</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/ketua_rt_3.jpg') }}" alt="img-fluid"
                                style="width:100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rt[2]->ketuaRT->nama }}</h4>
                            <span>Ketua RT 3</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/sekretaris_rt_3.jpg') }}" alt="img-fluid"
                                style="width:100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rt[2]->sekretarisRT->nama }}</h4>
                            <span>Sekretaris RT 3</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
                <div class="d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="team-member">
                        <div class="member-img" style="height: 400px;">
                            <img src="{{ asset('assets/image/foto-struktur/bendahara_rt_3.jpg') }}" alt="img-fluid"
                                style="width:100%;">
                        </div>
                        <div class="member-info">
                            <h4>{{ $rt[2]->bendaharaRT->nama }}</h4>
                            <span>Bendahara RT 3</span>
                        </div>
                    </div>
                </div><!-- End Team Member -->
            </div>

        </div>

    </section><!-- /Team Section -->


    <div class="container">

    </div>

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Contact</h2>
            <p>Hubungi Kami</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="row gy-4">
                        <div class="col-md-3">
                            <div class="info-item" data-aos="fade" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Alamat</h3>
                                <p>Jl. Kembang Turi, Lowokwaru</p>
                                <p>Kota Malang</p>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="col-md-3">
                            <div class="info-item" data-aos="fade" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <a href="https://wa.me/628110992160"
                                    style="color: #5d6df3; text-decoration: underline;">+6282110992160</a>
                                <br><br>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="col-md-3">
                            <div class="info-item" data-aos="fade" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>info@smartrw.co.id</p>
                                <br>
                            </div>
                        </div><!-- End Info Item -->
                        <div class="col-md-3">
                            <div class="info-item" data-aos="fade" data-aos-delay="500">
                                <i class="bi bi-clock"></i>
                                <h3>Jam Respon</h3>
                                <p>Senin - Jumat</p>
                                <p>07.00 WIB - 15.00 WIB</p>
                            </div>
                        </div><!-- End Info Item -->
                    </div>
                </div>
            </div>
        </div>

    </section><!-- /Contact Section -->
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('assets/owl.carousel.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var owl = $('.owl-carousel');
            owl.owlCarousel({
                center: true,
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 4,
                        nav: false,
                    }
                }
            });
        });
    </script>

    <script>
        $('#kegiatanwarga-table').on('click', '.showAgendaButtonDetail', function() {
            var modal = $('#showModalDetail');
            modal.find('#nama').text($(this).data('nama'));
            modal.find('#deskripsi').text($(this).data('deskripsi'));
            modal.find('#tanggal_kegiatan').text($(this).data('tanggal'));
            modal.find('#rt_id').text($(this).data('rt'));
            modal.find('#rw_id').text($(this).data('rw'));
            modal.find('#lampiran').attr('src', $(this).data('lampiran'));
            modal.modal('show');
        });
    </script>
@endpush
