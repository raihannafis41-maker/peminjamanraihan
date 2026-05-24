@extends('layouts.appuser')

@section('title', 'Dashboard Admin')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2 align-items-center">

            <div class="col-sm-6">

                <h1 class="font-weight-bold">
                    Dashboard Admin
                </h1>

                <small class="text-muted">
                    Sistem Informasi Peminjaman Alat
                </small>

            </div>

            <div class="col-sm-6 text-right">

                <span class="badge badge-success p-2">
                    <i class="fas fa-circle"></i>
                    Online
                </span>

            </div>

        </div>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <!-- INFO BOX -->
        <div class="row">

            <!-- TOTAL USER -->
            <div class="col-lg-3 col-md-6 col-12">

                <div class="small-box bg-primary shadow">

                    <div class="inner">

                        <h3>
                            {{ $totalUser ?? 0 }}
                        </h3>

                        <p>
                            Total User
                        </p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <a href="/master/user"
                       class="small-box-footer">

                        Kelola Data
                        <i class="fas fa-arrow-circle-right"></i>

                    </a>

                </div>

            </div>

            <!-- TOTAL PEMINJAM -->
            <div class="col-lg-3 col-md-6 col-12">

                <div class="small-box bg-success shadow">

                    <div class="inner">

                        <h3>
                            {{ $totalPeminjam ?? 0 }}
                        </h3>

                        <p>
                            Total Peminjam
                        </p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-user-check"></i>
                    </div>

                    <a href="/master/peminjam"
                       class="small-box-footer">

                        Kelola Data
                        <i class="fas fa-arrow-circle-right"></i>

                    </a>

                </div>

            </div>

            <!-- TOTAL ALAT -->
            <div class="col-lg-3 col-md-6 col-12">

                <div class="small-box bg-warning shadow">

                    <div class="inner">

                        <h3>
                            {{ $totalAlat ?? 0 }}
                        </h3>

                        <p>
                            Total Alat
                        </p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-tools"></i>
                    </div>

                    <a href="/master/alat"
                       class="small-box-footer">

                        Kelola Data
                        <i class="fas fa-arrow-circle-right"></i>

                    </a>

                </div>

            </div>

            <!-- TOTAL PEMINJAMAN -->
            <div class="col-lg-3 col-md-6 col-12">

                <div class="small-box bg-danger shadow">

                    <div class="inner">

                        <h3>
                            {{ $totalPeminjaman ?? 0 }}
                        </h3>

                        <p>
                            Total Peminjaman
                        </p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-book"></i>
                    </div>

                    <a href="/transaksi/peminjaman"
                       class="small-box-footer">

                        Kelola Data
                        <i class="fas fa-arrow-circle-right"></i>

                    </a>

                </div>

            </div>

        </div>

        <!-- WELCOME -->
        <div class="row">

            <div class="col-lg-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary">

                        <h3 class="card-title">

                            <i class="fas fa-home mr-1"></i>
                            Selamat Datang Admin

                        </h3>

                    </div>

                    <div class="card-body">

                        <h5 class="font-weight-bold">
                            Sistem Informasi Peminjaman Alat
                        </h5>

                        <p class="text-muted">

                            Anda login sebagai Admin.
                            Silahkan mengelola seluruh data sistem seperti:

                        </p>

                        <ul>

                            <li>Manajemen User</li>

                            <li>Data Peminjam</li>

                            <li>Data Alat</li>

                            <li>Transaksi Peminjaman</li>

                            <li>Pengembalian Alat</li>

                            <li>Laporan Sistem</li>

                        </ul>

                    </div>

                </div>

            </div>

            <!-- QUICK MENU -->
            <div class="col-lg-4">

                <div class="card shadow-sm">

                    <div class="card-header bg-dark">

                        <h3 class="card-title">

                            <i class="fas fa-bolt mr-1"></i>
                            Quick Menu

                        </h3>

                    </div>

                    <div class="card-body">

                        <a href="/master/user"
                           class="btn btn-primary btn-block mb-2">

                            <i class="fas fa-users"></i>
                            Data User

                        </a>

                        <a href="/master/alat"
                           class="btn btn-warning btn-block mb-2">

                            <i class="fas fa-tools"></i>
                            Data Alat

                        </a>

                        <a href="/transaksi/peminjaman"
                           class="btn btn-success btn-block mb-2">

                            <i class="fas fa-handshake"></i>
                            Peminjaman

                        </a>

                        <a href="/laporan"
                           class="btn btn-danger btn-block">

                            <i class="fas fa-file-alt"></i>
                            Laporan

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- TABEL AKTIVITAS -->
        <div class="card shadow-sm">

            <div class="card-header bg-info">

                <h3 class="card-title">

                    <i class="fas fa-history mr-1"></i>
                    Aktivitas Terbaru

                </h3>

            </div>

            <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">

                    <thead>

                        <tr>

                            <th>No</th>
                            <th>User</th>
                            <th>Aktivitas</th>
                            <th>Tanggal</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($logActivity ?? [] as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->user->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $item->aktivitas }}
                            </td>

                            <td>
                                {{ $item->created_at }}
                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center">

                                Belum ada aktivitas

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection