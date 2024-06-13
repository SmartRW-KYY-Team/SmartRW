<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('assets/image/logo-navbar.svg') }}" alt="SmartRW">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Beranda<br></a></li>
                <li><a href="{{ route('pengaduan_page') }}">Pengaduan</a></li>
                <li class="dropdown"><a href="#"><span>Keuangan</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="{{ route('keuanganWarga.rt.index') }}">RT</a></li>
                        <li><a href="{{ route('keuanganWarga.rw.index') }}">RW</a></li>
                    </ul>
                </li>
                {{-- <li class="dropdown"><a href="#"><span>Pengajuan Surat</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        <li><a href="#">Surat SKTM</a></li>
                        <li><a href="#">Surat Domisili</a></li>
                        <li><a href="#">Status Surat SKTM</a></li>
                        <li><a href="#">Status Surat Domisili</a></li>
                    </ul>
                </li> --}}
                <li class="dropdown"><a href="#"><span>Pengajuan Surat</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>

                        <li class="dropdown"><a href="{{ route('sktm_page') }}"><span>Surat SKTM</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ route('cek_sktm_page') }}">Status SKTM</a></li>

                            </ul>
                        </li>
                        <li class="dropdown"><a href="{{ route('domisili_page') }}"><span>Surat Domisili</span> <i
                                    class="bi bi-chevron-down toggle-dropdown"></i></a>
                            <ul>
                                <li><a href="{{ route('cek_domisili_page') }}">Status Domisili</a></li>

                            </ul>
                        </li>

                    </ul>
                </li>
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

        <a class="btn-getstarted flex-md-shrink-0" href="index.html#about">Login</a>

    </div>
</header>
