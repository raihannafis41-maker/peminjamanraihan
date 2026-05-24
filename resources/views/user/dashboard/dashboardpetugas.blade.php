@extends('layouts.appuser')

@section('title', 'Dashboard Petugas')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <div>

                <h1 class="mb-1">
                    Dashboard Petugas
                </h1>

                <p class="text-muted mb-0">
                    Selamat datang di sistem peminjaman alat
                </p>

            </div>

            <div>

                <span class="badge badge-primary p-2">
                    Petugas Aktif
                </span>

            </div>

        </div>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <!-- INFO BOX -->
        <div class="row">

            <!-- TOTAL ALAT -->
            <div class="col-lg-3 col-md-6 col-12">

                <div class="small-box bg-primary shadow">

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

                </div>

            </div>

            <!-- TOTAL KATEGORI -->
            <div class="col-lg-3 col-md-6 col-12">

                <div class="small-box bg-success shadow">

                    <div class="inner">

                        <h3>
                            {{ $totalKategori ?? 0 }}
                        </h3>

                        <p>
                            Total Kategori
                        </p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-list"></i>
                    </div>

                </div>

            </div>

            <!-- TOTAL PEMINJAMAN -->
            <div class="col-lg-3 col-md-6 col-12">

                <div class="small-box bg-warning shadow">

                    <div class="inner">

                        <h3>
                            {{ $totalPeminjaman ?? 0 }}
                        </h3>

                        <p>
                            Total Peminjaman
                        </p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-handshake"></i>
                    </div>

                </div>

            </div>

            <!-- TOTAL PENGEMBALIAN -->
            <div class="col-lg-3 col-md-6 col-12">

                <div class="small-box bg-danger shadow">

                    <div class="inner">

                        <h3>
                            {{ $totalPengembalian ?? 0 }}
                        </h3>

                        <p>
                            Total Pengembalian
                        </p>

                    </div>

                    <div class="icon">
                        <i class="fas fa-undo"></i>
                    </div>

                </div>

            </div>

        </div>

        <!-- ROW -->
        <div class="row">

            <!-- AKTIVITAS -->
            <div class="col-lg-8">

                <div class="card shadow-sm">

                    <div class="card-header bg-primary">

                        <h3 class="card-title">

                            Aktivitas Sistem

                        </h3>

                    </div>

                    <div class="card-body">

                        <div class="timeline">

                            <div class="time-label">
                                <span class="bg-success">
                                    Aktivitas Hari Ini
                                </span>
                            </div>

                            <div>

                                <i class="fas fa-sign-in-alt bg-primary"></i>

                                <div class="timeline-item">

                                    <span class="time">
                                        <i class="fas fa-clock"></i>
                                        Sekarang
                                    </span>

                                    <h3 class="timeline-header">
                                        Login ke Sistem
                                    </h3>

                                    <div class="timeline-body">
                                        Petugas berhasil login ke sistem
                                        peminjaman alat.
                                    </div>

                                </div>

                            </div>

                            <div>

                                <i class="fas fa-box bg-warning"></i>

                                <div class="timeline-item">

                                    <span class="time">
                                        <i class="fas fa-clock"></i>
                                        Hari ini
                                    </span>

                                    <h3 class="timeline-header">
                                        Monitoring Inventaris
                                    </h3>

                                    <div class="timeline-body">
                                        Melakukan monitoring data alat
                                        dan stok inventaris.
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- QUICK MENU -->
            <div class="col-lg-4">

                <div class="card shadow-sm">

                    <div class="card-header bg-success">

                        <h3 class="card-title">

                            Menu Cepat

                        </h3>

                    </div>

                    <div class="card-body">

                        <a href="/master/alat"
                           class="btn btn-primary btn-block mb-3">

                            <i class="fas fa-tools mr-2"></i>
                            Kelola Alat

                        </a>

                        <a href="/transaksi/peminjaman"
                           class="btn btn-warning btn-block mb-3">

                            <i class="fas fa-handshake mr-2"></i>
                            Data Peminjaman

                        </a>

                        <a href="/transaksi/pengembalian"
                           class="btn btn-success btn-block mb-3">

                            <i class="fas fa-undo mr-2"></i>
                            Data Pengembalian

                        </a>

                        <a href="/laporan"
                           class="btn btn-danger btn-block">

                            <i class="fas fa-file-alt mr-2"></i>
                            Laporan Sistem

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- TABEL -->
        <div class="card shadow-sm">

            <div class="card-header bg-dark">

                <h3 class="card-title">

                    Informasi Sistem

                </h3>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped">

                    <tr>
                        <th width="250">
                            Nama Sistem
                        </th>

                        <td>
                            Sistem Informasi Peminjaman Alat
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Role Login
                        </th>

                        <td>
                            Petugas
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Status Sistem
                        </th>

                        <td>
                            <span class="badge badge-success">
                                Aktif
                            </span>
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Hak Akses
                        </th>

                        <td>
                            Kelola alat, transaksi,
                            pengembalian, dan laporan
                        </td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection