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
                        <h3>RW 04 Jatimulyo</h3>
                        <h2>Wilayah yang Nyaman dan Aman</h2>
                        <p>
                            RW 04 di Kelurahan Jatimulyo, Kabupaten Malang, adalah wilayah yang nyaman dengan
                            komunitas yang kuat dan keindahan alam yang asri. Dikenal dengan infrastruktur yang
                            baik, jalan beraspal, dan lingkungan hijau, RW 04 memiliki fasilitas umum seperti
                            posyandu, balai RW, dan tempat ibadah yang mendukung kehidupan warganya. Komunitas di
                            sini aktif dalam berbagai kegiatan sosial dan keagamaan, mempererat hubungan antarwarga.
                            Akses pendidikan dan kesehatan juga memadai dengan beberapa sekolah dan puskesmas di
                            sekitar. Lokasinya strategis dengan akses mudah ke pusat kelurahan dan fasilitas
                            penting, menjadikannya tempat ideal untuk tinggal.
                        </p>
                        <div class="text-center text-lg-start">
                            <a href="https://radarmalang.jawapos.com/kota-malang/811069483/murbei-jadi-ikon-rw-04-kelurahan-jatimulyo"
                                class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center"
                                target="_blank">
                                <span>Read More</span>
                                <i class="bi bi-arrow-right"></i>
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
    <section id="values" class="values section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Agenda</h2>
            <p>Agenda Kegiatan RW 4<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                @foreach ($agenda as $agnd)
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card">
                            <img src="{{ asset('assets_landing/assets/img/values-1.png') }}" class="img-fluid"
                                alt="">
                            <h3>{{ $agnd->nama }}</h3>
                            <p>{{ $agnd->deskripsi }}
                            </p>
                            <p>
                                Tanggal : {{ $agnd->tanggal }}
                            </p>
                        </div>
                    </div><!-- End Card Item -->
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

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Features</h2>
            <p>Our Advacedd Features<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-5">

                <div class="col-xl-6" data-aos="zoom-out" data-aos-delay="100">
                    <img src="{{ asset('assets_landing/assets/img/features.png') }}" class="img-fluid" alt="">
                </div>

                <div class="col-xl-6 d-flex">
                    <div class="row align-self-center gy-4">

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Eos aspernatur rem</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Facilis neque ipsa</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Volup amet volupt</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Rerum omnis sint</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Alias possimus</h3>
                            </div>
                        </div><!-- End Feature Item -->

                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="700">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Repellendus molli</h3>
                            </div>
                        </div><!-- End Feature Item -->

                    </div>
                </div>

            </div>

        </div>

    </section><!-- /Features Section -->

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

    <!-- Services Section -->
    <section id="services" class="services section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Services</h2>
            <p>Check Our Services<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item item-cyan position-relative">
                        <i class="bi bi-activity icon"></i>
                        <h3>Nesciunt Mete</h3>
                        <p>Provident nihil minus qui consequatur non omnis maiores. Eos accusantium minus dolores
                            iure perferendis tempore et consequatur.</p>
                        <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item item-orange position-relative">
                        <i class="bi bi-broadcast icon"></i>
                        <h3>Eosle Commodi</h3>
                        <p>Ut autem aut autem non a. Sint sint sit facilis nam iusto sint. Libero corrupti neque eum
                            hic non ut nesciunt dolorem.</p>
                        <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item item-teal position-relative">
                        <i class="bi bi-easel icon"></i>
                        <h3>Ledo Markt</h3>
                        <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id
                            voluptas adipisci eos earum corrupti.</p>
                        <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item item-red position-relative">
                        <i class="bi bi-bounding-box-circles icon"></i>
                        <h3>Asperiores Commodi</h3>
                        <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga
                            sit provident adipisci neque.</p>
                        <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item item-indigo position-relative">
                        <i class="bi bi-calendar4-week icon"></i>
                        <h3>Velit Doloremque.</h3>
                        <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed
                            animi at autem alias eius labore.</p>
                        <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item item-pink position-relative">
                        <i class="bi bi-chat-square-text icon"></i>
                        <h3>Dolori Architecto</h3>
                        <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure.
                            Corrupti recusandae ducimus enim.</p>
                        <a href="#" class="read-more stretched-link"><span>Read More</span> <i
                                class="bi bi-arrow-right"></i></a>
                    </div>
                </div><!-- End Service Item -->

            </div>

        </div>

    </section><!-- /Services Section -->

    <!-- Pricing Section -->
    <section id="pricing" class="pricing section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pricing</h2>
            <p>Check Our Affordable Pricing<br></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row gy-4">

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="pricing-tem">
                        <h3 style="color: #20c997;">Free Plan</h3>
                        <div class="price"><sup>$</sup>0<span> / mo</span></div>
                        <div class="icon">
                            <i class="bi bi-box" style="color: #20c997;"></i>
                        </div>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li class="na">Pharetra massa</li>
                            <li class="na">Massa ultricies mi</li>
                        </ul>
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="pricing-tem">
                        <span class="featured">Featured</span>
                        <h3 style="color: #0dcaf0;">Starter Plan</h3>
                        <div class="price"><sup>$</sup>19<span> / mo</span></div>
                        <div class="icon">
                            <i class="bi bi-send" style="color: #0dcaf0;"></i>
                        </div>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li class="na">Massa ultricies mi</li>
                        </ul>
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                    <div class="pricing-tem">
                        <h3 style="color: #fd7e14;">Business Plan</h3>
                        <div class="price"><sup>$</sup>29<span> / mo</span></div>
                        <div class="icon">
                            <i class="bi bi-airplane" style="color: #fd7e14;"></i>
                        </div>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li>Massa ultricies mi</li>
                        </ul>
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div><!-- End Pricing Item -->

                <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="pricing-tem">
                        <h3 style="color: #0d6efd;">Ultimate Plan</h3>
                        <div class="price"><sup>$</sup>49<span> / mo</span></div>
                        <div class="icon">
                            <i class="bi bi-rocket" style="color: #0d6efd;"></i>
                        </div>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li>Massa ultricies mi</li>
                        </ul>
                        <a href="#" class="btn-buy">Buy Now</a>
                    </div>
                </div><!-- End Pricing Item -->

            </div><!-- End pricing row -->

        </div>

    </section><!-- /Pricing Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>F.A.Q</h2>
            <p>Frequently Asked Questions</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

                    <div class="faq-container">

                        <div class="faq-item faq-active">
                            <h3>Non consectetur a erat nam at lectus urna duis?</h3>
                            <div class="faq-content">
                                <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus
                                    laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor
                                    rhoncus dolor purus non.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                    interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                    scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                    Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Dolor sit amet consectetur adipiscing elit pellentesque?</h3>
                            <div class="faq-content">
                                <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci.
                                    Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl
                                    suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis
                                    convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div><!-- End Faq Column-->

                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">

                    <div class="faq-container">

                        <div class="faq-item">
                            <h3>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</h3>
                            <div class="faq-content">
                                <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id
                                    interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus
                                    scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim.
                                    Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</h3>
                            <div class="faq-content">
                                <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse
                                    in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl
                                    suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
                                </p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                        <div class="faq-item">
                            <h3>Perspiciatis quod quo quos nulla quo illum ullam?</h3>
                            <div class="faq-content">
                                <p>Enim ea facilis quaerat voluptas quidem et dolorem. Quis et consequatur non sed
                                    in suscipit sequi. Distinctio ipsam dolore et.</p>
                            </div>
                            <i class="faq-toggle bi bi-chevron-right"></i>
                        </div><!-- End Faq item-->

                    </div>

                </div><!-- End Faq Column-->

            </div>

        </div>

    </section><!-- /Faq Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Portfolio</h2>
            <p>Check our latest work</p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-product">Product</li>
                    <li data-filter=".filter-branding">Branding</li>
                    <li data-filter=".filter-books">Books</li>
                </ul><!-- End Portfolio Filters -->

                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/app-1.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>App 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/app-1.jpg') }}" title="App 1"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/product-1.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Product 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/product-1.jpg') }}"
                                    title="Product 1" data-gallery="portfolio-gallery-product"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/branding-1.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Branding 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/branding-1.jpg') }}"
                                    title="Branding 1" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/books-1.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Books 1</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/books-1.jpg') }}"
                                    title="Branding 1" data-gallery="portfolio-gallery-book"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/app-2.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>App 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/app-2.jpg') }}" title="App 2"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/product-2.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Product 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/product-2.jpg') }}"
                                    title="Product 2" data-gallery="portfolio-gallery-product"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/branding-2.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Branding 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/branding-2.jpg') }}"
                                    title="Branding 2" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/books-2.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Books 2</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/books-2.jpg') }}"
                                    title="Branding 2" data-gallery="portfolio-gallery-book"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/app-3.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>App 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/app-3.jpg') }}" title="App 3"
                                    data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i
                                        class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/product-3.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Product 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/product-3.jpg') }}"
                                    title="Product 3" data-gallery="portfolio-gallery-product"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/branding-3.jpg') }}"
                                class="img-fluid" alt="">
                            <div class="portfolio-info">
                                <h4>Branding 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/branding-3.jpg') }}"
                                    title="Branding 2" data-gallery="portfolio-gallery-branding"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-books">
                        <div class="portfolio-content h-100">
                            <img src="{{ asset('assets_landing/assets/img/portfolio/books-3.jpg') }}" class="img-fluid"
                                alt="">
                            <div class="portfolio-info">
                                <h4>Books 3</h4>
                                <p>Lorem ipsum, dolor sit amet consectetur</p>
                                <a href="{{ asset('assets_landing/assets/img/portfolio/books-3.jpg') }}"
                                    title="Branding 3" data-gallery="portfolio-gallery-book"
                                    class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                                <a href="portfolio-details.html" title="More Details" class="details-link"><i
                                        class="bi bi-link-45deg"></i></a>
                            </div>
                        </div>
                    </div><!-- End Portfolio Item -->

                </div><!-- End Portfolio Container -->

            </div>

        </div>

    </section><!-- /Portfolio Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Testimonials</h2>
            <p>What they are saying about us<br></p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="swiper">
                <script type="application/json" class="swiper-config">
            {
            "loop": true,
            "speed": 600,
            "autoplay": {
                "delay": 5000
            },
            "slidesPerView": "auto",
            "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
            },
            "breakpoints": {
                "320": {
                "slidesPerView": 1,
                "spaceBetween": 40
                },
                "1200": {
                "slidesPerView": 3,
                "spaceBetween": 1
                }
            }
            }
        </script>
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('assets_landing/assets/img/testimonials/testimonials-1.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Saul Goodman</h3>
                                <h4>Ceo &amp; Founder</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                legam anim culpa.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('assets_landing/assets/img/testimonials/testimonials-2.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Sara Wilsson</h3>
                                <h4>Designer</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem
                                veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint
                                minim.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('assets_landing/assets/img/testimonials/testimonials-3.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Jena Karlis</h3>
                                <h4>Store Owner</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim
                                fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem
                                dolore labore illum veniam.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('assets_landing/assets/img/testimonials/testimonials-4.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>Matt Brandon</h3>
                                <h4>Freelancer</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <div class="stars">
                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                    class="bi bi-star-fill"></i>
                            </div>
                            <p>
                                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                culpa fore nisi cillum quid.
                            </p>
                            <div class="profile mt-auto">
                                <img src="{{ asset('assets_landing/assets/img/testimonials/testimonials-5.jpg') }}"
                                    class="testimonial-img" alt="">
                                <h3>John Larson</h3>
                                <h4>Entrepreneur</h4>
                            </div>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>

    </section><!-- /Testimonials Section -->

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
@endpush
