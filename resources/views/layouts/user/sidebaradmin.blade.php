<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <span class="brand-text font-weight-bold">
            UKK PEMINJAMAN
        </span>
    </a>

    <div class="sidebar">

        <!-- User -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
                <img
                    src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->nama ?? 'Admin') }}"
                    class="img-circle elevation-2"
                    alt="User">
            </div>

            <div class="info">
                <a href="#" class="d-block">
                    {{ Auth::user()->nama ?? 'Administrator' }}
                </a>

                <small class="text-success">
                    Online
                </small>
            </div>

        </div>

        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                {{-- DASHBOARD --}}
                <li class="nav-item">

                    <a href="{{ route('dashboard') }}"
                       class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-home"></i>

                        <p>Dashboard</p>

                    </a>

                </li>

                {{-- MASTER DATA --}}
                <li class="nav-header">
                    MASTER DATA
                </li>

                <li class="nav-item">

                    <a href="{{ url('/master/user') }}"
                       class="nav-link {{ request()->is('master/user*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-users"></i>

                        <p>Data User</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ url('/master/peminjam') }}"
                       class="nav-link {{ request()->is('master/peminjam*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-user-friends"></i>

                        <p>Data Peminjam</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ url('/master/kategori') }}"
                       class="nav-link {{ request()->is('master/kategori*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tags"></i>

                        <p>Data Kategori</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ url('/master/kondisi') }}"
                       class="nav-link {{ request()->is('master/kondisi*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-clipboard-check"></i>

                        <p>Data Kondisi</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ url('/master/alat') }}"
                       class="nav-link {{ request()->is('master/alat*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-tools"></i>

                        <p>Data Alat</p>

                    </a>

                </li>

                {{-- TRANSAKSI --}}
                <li class="nav-header">
                    TRANSAKSI
                </li>

                <li class="nav-item">

                    <a href="{{ url('/transaksi/peminjaman') }}"
                       class="nav-link {{ request()->is('transaksi/peminjaman*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-handshake"></i>

                        <p>Peminjaman</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ url('/transaksi/pengembalian') }}"
                       class="nav-link {{ request()->is('transaksi/pengembalian*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-undo"></i>

                        <p>Pengembalian</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ url('/transaksi/denda') }}"
                       class="nav-link {{ request()->is('transaksi/denda*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-money-bill-wave"></i>

                        <p>Denda</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="{{ route('logactivity') }}"
                       class="nav-link {{ request()->is('transaksi/logactivity*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-history"></i>

                        <p>Log Activity</p>

                    </a>

                </li>

                {{-- LAPORAN --}}
                <li class="nav-header">
                    LAPORAN
                </li>

                <li class="nav-item">

                    <a href="{{ route('laporan.index') }}"
                       class="nav-link {{ request()->is('laporan*') ? 'active' : '' }}">

                        <i class="nav-icon fas fa-file-alt"></i>

                        <p>Laporan</p>

                    </a>

                </li>

                {{-- AKUN --}}
                <li class="nav-header">
                    AKUN
                </li>

                <li class="nav-item">

                    <a href="{{ route('logoutuser') }}"
                       onclick="return confirm('Yakin ingin logout?')"
                       class="nav-link text-danger">

                        <i class="nav-icon fas fa-sign-out-alt"></i>

                        <p>Logout</p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>