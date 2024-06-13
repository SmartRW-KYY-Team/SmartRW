<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('assets/image/logo-navbar.svg') }}" alt="">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Beranda<br></a></li>
                <li><a href="#about">Pengaduan</a></li>
                <li class="dropdown"><a href="#"><span>Keuangan</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Keuangan RT</a></li>
                        <li><a href="#">Keuangan RW</a></li>
                    </ul>
                </li>
                <li><a href="#portfolio">Aganda Kegiatan</a></li>
                <li><a href="#team">Pengajaun Surat</a></li>
                <li class="dropdown"><a href="#"><span>Pengajuan Surat</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Surat SKTM</a></li>
                        <li><a href="#">Surat Domisili</a></li>
                        <li><a href="#">Status Surat SKTM</a></li>
                        <li><a href="#">Status Surat Domisili</a></li>
                    </ul>
                </li>                
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted flex-md-shrink-0" href="index.html#about">Login</a>

    </div>
</header>
