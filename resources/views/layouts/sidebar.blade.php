<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="logo img-fluid">
                <a href="index.html"><img src="{{ asset('assets/image/Logo(2).svg') }}" alt="Logo"
                        style="width: 100%; height: 75px;"></a>
            </div>
            <div class="d-flex justify-content-center align-items-center">

                <div class="sidebar-toggler  x">
                    <a href="#" id="sidebar-hide" class="sidebar-hide d-xl-none d-block"><i
                            class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                @if (Auth::user()->role == 'rw' || Auth::user()->role == 'rt')
                    <li class="sidebar-item  ">
                        <a href="{{ route('dashboard.index') }}" class='sidebar-link'>
                            <i class="bi bi-speedometer"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'rw' || Auth::user()->role == 'rt')
                    <li class="sidebar-item {{ Request::is('warga*') ? 'active' : '' }}">
                        <a href="{{ route('warga.index') }}" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Data Warga</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role == 'rw' || Auth::user()->role == 'rt')
                    <li class="sidebar-item {{ Request::is('keluarga*') ? 'active' : '' }}">
                        <a href="{{ route('keluarga.index') }}" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Data Keluarga</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role == 'rw')
                    <li class="sidebar-item {{ Request::is('rt*') ? 'active' : '' }}">
                        <a href="{{ route('rt.index') }}" class='sidebar-link'>
                            <i class="bi bi-people-fill"></i>
                            <span>Data RT</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role == 'rw' || Auth::user()->role == 'rt')
                    <li class="sidebar-item {{ Request::is('kegiatan*') ? 'active' : '' }}">
                        <a href="{{ route('kegiatan.index') }}" class='sidebar-link'>
                            <i class="bi bi-calendar-event-fill"></i>
                            <span>Agenda Kegiatan</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role == 'rw' || Auth::user()->role == 'rt')
                    <li class="sidebar-item {{ Request::is('bansos*') ? 'active' : '' }}">
                        <a href="{{ route('bansos.index') }}" class='sidebar-link'>
                            <i class="bi bi-info-circle-fill"></i>
                            <span>Bantuan Sosial</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role == 'rw')
                    <li class="sidebar-item {{ Request::is('keuanganrw*') ? 'active' : '' }}">
                        <a href="{{ route('keuanganrw.index') }}" class='sidebar-link'>
                            <i class="bi bi-cash-coin"></i>
                            <span>Mengelola Iuran (RW dan Bendahara)</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role == 'rw' || Auth::user()->role == 'rt')
                    <li class="sidebar-item {{ Request::is('pengaduan*') ? 'active' : '' }}">
                        <a href="{{ route('pengaduan.index') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Pengaduan Masalah</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role == 'rw' || Auth::user()->role == 'rt')
                    <li class="sidebar-item has-sub active">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-text-fill"></i>
                            <span>Mengelola Surat</span>
                        </a>

                        <ul class="submenu">

                            <li class="submenu-item ">
                                <a href="#" class="submenu-link">SKTM</a>

                            </li>

                            <li class="submenu-item  ">
                                <a href="#" class="submenu-link">Domilisi</a>

                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->role == 'rt')
                    <li class="sidebar-item {{ Request::is('keuanganrt*') ? 'active' : '' }}">
                        <a href="{{ route('keuanganrt.index') }}" class='sidebar-link'>
                            <i class="bi bi-cash-coin"></i>
                            <span>Mengelola Iuran (RT)</span>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->role == 'rw' || Auth::user()->role == 'rt')
                    <li class="sidebar-item {{ Request::is('keuanganrt*') ? 'active' : '' }}">
                        <a href="{{ route('keuanganrt.index') }}" class='sidebar-link'>
                            <i class="bi bi-file-earmark-zip-fill"></i>
                            <span>Laporan Keuangan</span>
                        </a>
                    </li>
                @endif

                <li class="sidebar-title">Setting</li>

                <li class="sidebar-item  ">
                    <a href="form-layout.html" class='sidebar-link'>
                        <i class="bi bi-person-circle"></i>
                        <span>Profil</span>
                    </a>

                    <a href="{{ route('logout') }}" class='sidebar-link'
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
