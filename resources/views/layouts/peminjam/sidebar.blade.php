<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- BRAND -->
    <a href="{{ route('zonapeminjam.dashboard') }}"
       class="brand-link text-center">

        <span class="brand-text font-weight-bold">
            ZONA PEMINJAM
        </span>

    </a>

    <!-- SIDEBAR -->
    <div class="sidebar">

        <!-- USER -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="image">

                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->nama }}"
                     class="img-circle elevation-2">

            </div>

            <div class="info">

                <a href="#"
                   class="d-block">

                    {{ Auth::user()->nama }}

                </a>

            </div>

        </div>

        <!-- MENU -->
        <nav class="mt-2">

            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu">

                <!-- DASHBOARD -->
                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.dashboard') }}"
                       class="nav-link">

                        <i class="nav-icon fas fa-home"></i>

                        <p>Dashboard</p>

                    </a>

                </li>


                <!-- RIWAYAT -->
                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.riwayat') }}"
                       class="nav-link">

                        <i class="nav-icon fas fa-history"></i>

                        <p>Riwayat Peminjaman</p>

                    </a>

                </li>

                <!-- KATEGORI -->
                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.kategori') }}"
                       class="nav-link">

                        <i class="nav-icon fas fa-list"></i>

                        <p>Kategori</p>

                    </a>

                </li>

                <!-- ALAT -->
                <li class="nav-item">

                    <a href="{{ route('zonapeminjam.alat') }}"
                       class="nav-link">

                        <i class="nav-icon fas fa-tools"></i>

                        <p>Daftar Alat</p>

                    </a>

                </li>

                <!-- LOGOUT -->
                <li class="nav-item mt-3">

                    <a href="{{ route('logoutpeminjam') }}"
                       class="nav-link bg-danger">

                        <i class="nav-icon fas fa-sign-out-alt"></i>

                        <p>Logout</p>

                    </a>

                </li>

            </ul>

        </nav>

    </div>

</aside>