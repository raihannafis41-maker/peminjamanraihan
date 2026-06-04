<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- BRAND -->
    <a href="{{ route('zonapeminjam.dashboard') }}"
        class="brand-link text-center">

        <i class="fas fa-user-graduate text-warning mr-2"></i>

        <span class="brand-text font-weight-bold">
            ZONA PEMINJAM
        </span>

    </a>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <!-- USER PANEL -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">

                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama) }}&background=0D8ABC&color=fff"
                    class="img-circle elevation-2"
                    alt="User">

            </div>

            <div class="info">

                <a href="#" class="d-block">

                    {{ Auth::user()->nama }}

                </a>

                <small class="text-success">
                    <i class="fas fa-circle"></i> Online
                </small>

            </div>

        </div>

        <!-- MENU -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <!-- DASHBOARD -->
                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.dashboard') }}"
                        class="nav-link {{ request()->is('zonapeminjam/dashboard') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-home"></i>

                        <p>Dashboard</p>

                    </a>

                </li>

                <!-- PEMINJAMAN -->
                <li class="nav-header">
                    PEMINJAMAN
                </li>

                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.status') }}"
                        class="nav-link {{ request()->is('zonapeminjam/status*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-clock"></i>

                        <p>Status Peminjaman</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.riwayat') }}"
                        class="nav-link {{ request()->is('zonapeminjam/riwayat*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-history"></i>

                        <p>Riwayat Peminjaman</p>

                    </a>

                </li>

                <!-- INFORMASI -->
                <li class="nav-header">
                    INFORMASI
                </li>

                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.kategori') }}"
                        class="nav-link {{ request()->is('zonapeminjam/kategori*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-list"></i>

                        <p>Kategori</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.alat') }}"
                        class="nav-link {{ request()->is('zonapeminjam/alat*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tools"></i>

                        <p>Daftar Alat</p>

                    </a>

                </li>

                <!-- KEUANGAN -->
                <li class="nav-header">
                    KEUANGAN
                </li>

                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.denda') }}" 
                    class="nav-link {{ request()->routeIs('zonapeminjam.denda') ? 'active' : '' }}"> 
                    
                    <i class="nav-icon fas fa-money-bill-wave"></i>
                        <p>Pembayaran Denda</p>
                    </a>

                </li>

                <!-- SURAT -->
                <li class="nav-header">
                    SURAT & NOTIFIKASI
                </li>

                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.suratteguran') }}"
                        class="nav-link {{ request()->routeIs('zonapeminjam.suratteguran') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>Surat Teguran</p>
                    </a>

                </li>

                <!-- AKUN -->
                <li class="nav-header">
                    AKUN
                </li>

                <li class="nav-item">

                    <a href="{{ route('logoutpeminjam') }}"
                        onclick="return confirm('Yakin ingin logout?')"
                        class="nav-link bg-danger">

                        <i class="nav-icon fas fa-sign-out-alt"></i>

                        <p>Logout</p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>