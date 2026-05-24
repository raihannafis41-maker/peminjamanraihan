<nav class="main-header navbar navbar-expand navbar-white navbar-light border-bottom">

    <!-- LEFT NAVBAR -->
    <ul class="navbar-nav">

        <li class="nav-item">

            <a class="nav-link"
               data-widget="pushmenu"
               href="#">

                <i class="fas fa-bars"></i>

            </a>

        </li>

        <li class="nav-item d-none d-sm-inline-block">

            <a href="/dashboardpeminjam"
               class="nav-link">

                Dashboard

            </a>

        </li>

    </ul>

    <!-- RIGHT NAVBAR -->
    <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown">

            <a class="nav-link"
               data-toggle="dropdown"
               href="#">

                <i class="fas fa-user-circle mr-1"></i>

                {{ Auth::user()->nama ?? 'Peminjam' }}

            </a>

            <div class="dropdown-menu dropdown-menu-right">

                <a href="/dashboardpeminjam"
                   class="dropdown-item">

                    <i class="fas fa-home mr-2"></i>
                    Dashboard

                </a>

                <div class="dropdown-divider"></div>

                <a href="/logoutpeminjam"
                   class="dropdown-item text-danger">

                    <i class="fas fa-sign-out-alt mr-2"></i>
                    Logout

                </a>

            </div>

        </li>

    </ul>

</nav>