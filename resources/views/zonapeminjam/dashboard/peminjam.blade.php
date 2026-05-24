@extends('layouts.apppeminjam')

@section('title', 'Dashboard Peminjam')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-3">

            <div class="col-sm-6">

                <h1 class="fw-bold">
                    Dashboard Peminjam
                </h1>

            </div>

        </div>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <!-- WELCOME -->
        <div class="card shadow border-0 mb-4">

            <div class="card-body p-4">

                <h3 class="fw-bold text-primary">
                    Selamat Datang,
                    {{ Auth::user()->nama }}
                </h3>

                <p class="text-muted mb-0">
                    Silahkan lakukan peminjaman alat,
                    melihat status peminjaman,
                    dan monitoring riwayat transaksi Anda.
                </p>

            </div>

        </div>

        <!-- MENU -->
        <div class="row">

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="card shadow border-0 h-100">

                    <div class="card-body text-center p-5">

                        <div class="mb-4">
                            <i class="fas fa-handshake fa-4x text-primary"></i>
                        </div>

                        <h4 class="fw-bold">
                            Peminjaman
                        </h4>

                        <p class="text-muted">
                            Ajukan peminjaman alat
                            secara online.
                        </p>

                        <a href="/zonapeminjam/peminjaman"
                           class="btn btn-primary">

                            Lihat Data

                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="card shadow border-0 h-100">

                    <div class="card-body text-center p-5">

                        <div class="mb-4">
                            <i class="fas fa-history fa-4x text-success"></i>
                        </div>

                        <h4 class="fw-bold">
                            Riwayat
                        </h4>

                        <p class="text-muted">
                            Lihat riwayat peminjaman
                            dan pengembalian alat.
                        </p>

                        <a href="/zonapeminjam/peminjaman"
                           class="btn btn-success">

                            Riwayat

                        </a>

                    </div>

                </div>

            </div>

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="card shadow border-0 h-100">

                    <div class="card-body text-center p-5">

                        <div class="mb-4">
                            <i class="fas fa-user fa-4x text-danger"></i>
                        </div>

                        <h4 class="fw-bold">
                            Profil
                        </h4>

                        <p class="text-muted">
                            Kelola data akun
                            dan informasi peminjam.
                        </p>

                        <a href="#"
                           class="btn btn-danger">

                            Profil

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection