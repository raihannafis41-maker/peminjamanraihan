{{-- resources/views/layouts/user/sidebarpetugas.blade.php --}}

<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- BRAND -->
    <a href="/dashboard"
       class="brand-link text-center">

        <span class="brand-text font-weight-bold">
            PANEL PETUGAS
        </span>

    </a>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <!-- USER PANEL -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">

                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama }}"
                     class="img-circle elevation-2"
                     alt="User">

            </div>

            <div class="info">

                <a href="#"
                   class="d-block">

                    {{ Auth::user()->nama }}

                </a>

                <small class="text-success">
                    Petugas
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

                    <a href="/dashboard"
                       class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-home"></i>

                        <p>Dashboard</p>

                    </a>

                </li>

                <!-- MASTER DATA -->
                <li class="nav-header">
                    MASTER DATA
                </li>

                <!-- PEMINJAM -->
                <li class="nav-item">

                    <a href="/master/peminjam"
                       class="nav-link {{ request()->is('master/peminjam*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-users"></i>

                        <p>Data Peminjam</p>

                    </a>

                </li>

                <!-- KATEGORI -->
                <li class="nav-item">

                    <a href="/master/kategori"
                       class="nav-link {{ request()->is('master/kategori*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-list"></i>

                        <p>Kategori</p>

                    </a>

                </li>

                <!-- KONDISI -->
                <li class="nav-item">

                    <a href="/master/kondisi"
                       class="nav-link {{ request()->is('master/kondisi*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-check-circle"></i>

                        <p>Kondisi</p>

                    </a>

                </li>

                <!-- ALAT -->
                <li class="nav-item">

                    <a href="/master/alat"
                       class="nav-link {{ request()->is('master/alat*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tools"></i>

                        <p>Data Alat</p>

                    </a>

                </li>

                <!-- TRANSAKSI -->
                <li class="nav-header">
                    TRANSAKSI
                </li>

                <!-- PEMINJAMAN -->
                <li class="nav-item">

                    <a href="/transaksi/peminjaman"
                       class="nav-link {{ request()->is('transaksi/peminjaman*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-handshake"></i>

                        <p>Peminjaman</p>

                    </a>

                </li>

                <!-- PENGEMBALIAN -->
                <li class="nav-item">

                    <a href="/transaksi/pengembalian"
                       class="nav-link {{ request()->is('transaksi/pengembalian*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-undo"></i>

                        <p>Pengembalian</p>

                    </a>

                </li>

                <!-- DENDA -->
                <li class="nav-item">

                    <a href="/transaksi/denda"
                       class="nav-link {{ request()->is('transaksi/denda*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-money-bill-wave"></i>

                        <p>Denda</p>

                    </a>

                </li>

                <!-- LOG ACTIVITY -->
                <li class="nav-item">

                    <a href="/transaksi/logactivity"
                       class="nav-link {{ request()->is('transaksi/logactivity*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-history"></i>

                        <p>Log Activity</p>

                    </a>

                </li>

                <!-- LAPORAN -->
                <li class="nav-header">
                    LAPORAN
                </li>

                <!-- LAPORAN -->
                <li class="nav-item">

                    <a href="/laporan"
                       class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-print"></i>

                        <p>Laporan</p>

                    </a>

                </li>

                <!-- LOGOUT -->
                <li class="nav-item mt-3">

                    <a href="/logoutuser"
                       class="nav-link bg-danger">

                        <i class="nav-icon fas fa-sign-out-alt"></i>

                        <p>Logout</p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>