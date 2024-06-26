<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="logo img-fluid">
                <a href="{{ route('dashboard.index') }}"><img src="{{ asset('assets/image/Logo(2).svg') }}" alt="Logo"
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
                    <li class="sidebar-item  {{ Request::is('dashboard*') ? 'active' : '' }}">
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
                    <li class="sidebar-item {{ Request::is('kriteriabansos*') ? 'active' : '' }}">
                        <a href="{{ route('kriteriabansos.index') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Kriteria Bansos</span>
                        </a>
                    </li>
                @endif


                @if (Auth::user()->role == 'rw')
                    <li class="sidebar-item {{ Request::is('keuanganrw*') ? 'active' : '' }}">
                        <a href="{{ route('keuanganrw.index') }}" class='sidebar-link'>
                            <i class="bi bi-cash-coin"></i>
                            <span>Keuangan</span>
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
                    <li
                        class="sidebar-item has-sub {{ Request::is('sktm*') || Request::is('domisili*') ? 'active' : '' }}">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-file-text-fill"></i>
                            <span>Mengelola Surat</span>
                        </a>

                        <ul class="submenu">
                            <li class="submenu-item {{ Request::is('sktm*') ? 'active' : '' }}">
                                <a href="{{ route('sktm.index') }}" class="submenu-link">SKTM</a>

                            </li>

                            <li class="submenu-item  {{ Request::is('domisili*') ? 'active' : '' }}">
                                <a href="{{ route('domisili.index') }}" class="submenu-link">Domilisi</a>

                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->role == 'rt')
                    <li class="sidebar-item {{ Request::is('keuanganrt*') ? 'active' : '' }}">
                        <a href="{{ route('keuanganrt.index') }}" class='sidebar-link'>
                            <i class="bi bi-cash-coin"></i>
                            <span>Keuangan</span>
                        </a>
                    </li>
                @endif


            </ul>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <script>
        function confirmLogout() {
            Swal.fire({
                title: 'Apakah anda ingin keluar?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>
@endpush
