<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- BRAND LOGO -->
    <a href="/dashboard" class="brand-link text-center">
        <i class="fas fa-tools text-warning mr-2"></i>

        <span class="brand-text font-weight-bold">
            UKK PEMINJAMAN
        </span>
    </a>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <!-- USER PANEL -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">
                <img src="https://ui-avatars.com/api/?name=Admin&background=0D8ABC&color=fff"
                     class="img-circle elevation-2"
                     alt="User Image">
            </div>

            <div class="info">
                <a href="#"
                   class="d-block">

                    {{ Auth::user()->nama ?? 'Administrator' }}

                </a>

                <small class="text-success">
                    Online
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

                        <p>
                            Dashboard
                        </p>

                    </a>

                </li>

                <!-- MASTER DATA -->
                <li class="nav-header text-uppercase">
                    MASTER DATA
                </li>

                <li class="nav-item has-treeview">

                    <a href="#"
                       class="nav-link">

                        <i class="nav-icon fas fa-database"></i>

                        <p>

                            Data Master

                            <i class="right fas fa-angle-left"></i>

                        </p>

                    </a>

                    <ul class="nav nav-treeview">

                        <li class="nav-item">

                            <a href="/master/user"
                               class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>User</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/master/peminjam"
                               class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Peminjam</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/master/kategori"
                               class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Kategori</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/master/kondisi"
                               class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Kondisi</p>

                            </a>

                        </li>

                        <li class="nav-item">

                            <a href="/master/alat"
                               class="nav-link">

                                <i class="far fa-circle nav-icon"></i>

                                <p>Alat</p>

                            </a>

                        </li>

                    </ul>

                </li>

                <!-- TRANSAKSI -->
                <li class="nav-header text-uppercase">
                    TRANSAKSI
                </li>

                <li class="nav-item">

                    <a href="/transaksi/peminjaman"
                       class="nav-link">

                        <i class="nav-icon fas fa-handshake"></i>

                        <p>Peminjaman</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/transaksi/pengembalian"
                       class="nav-link">

                        <i class="nav-icon fas fa-undo"></i>

                        <p>Pengembalian</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/transaksi/denda"
                       class="nav-link">

                        <i class="nav-icon fas fa-money-bill-wave"></i>

                        <p>Denda</p>

                    </a>

                </li>

                <li class="nav-item">

                    <a href="/transaksi/logactivity"
                       class="nav-link">

                        <i class="nav-icon fas fa-history"></i>

                        <p>Log Activity</p>

                    </a>

                </li>

                <!-- LAPORAN -->
                <li class="nav-header text-uppercase">
                    LAPORAN
                </li>

                <li class="nav-item">

                    <a href="/laporan"
                       class="nav-link">

                        <i class="nav-icon fas fa-file-alt"></i>

                        <p>Laporan</p>

                    </a>

                </li>

                <!-- LOGOUT -->
                <li class="nav-header text-uppercase">
                    AKUN
                </li>

                <li class="nav-item">

                    <a href="/logoutuser"
                       class="nav-link text-danger">

                        <i class="nav-icon fas fa-sign-out-alt"></i>

                        <p>Logout</p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>