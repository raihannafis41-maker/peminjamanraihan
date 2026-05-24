@extends('layouts.apptamu')

@section('title', 'Home')

@section('content')

<style>

/* =========================================
   HERO
========================================= */

.hero-section{
    min-height: 100vh;
    background:
        linear-gradient(rgba(0,0,0,0.70),
        rgba(0,0,0,0.70)),
        url("{{ asset('foto/banner/cafe.jpeg') }}");
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
}

.hero-title{
    font-size: 65px;
    font-weight: 800;
    line-height: 1.2;
}

.hero-subtitle{
    font-size: 18px;
    max-width: 750px;
    margin: auto;
    color: #f1f1f1;
}

/* =========================================
   BUTTON
========================================= */

.btn-modern{
    padding: 14px 35px;
    border-radius: 50px;
    font-weight: 600;
    transition: 0.3s;
}

.btn-modern:hover{
    transform: translateY(-3px);
}

/* =========================================
   CARD
========================================= */

.feature-card{
    border: none;
    border-radius: 25px;
    overflow: hidden;
    transition: 0.3s;
}

.feature-card:hover{
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.feature-icon{
    width: 90px;
    height: 90px;
    line-height: 90px;
    border-radius: 50%;
    margin: auto;
    font-size: 35px;
    color: white;
}

/* =========================================
   SECTION
========================================= */

.section-title{
    font-weight: 800;
    margin-bottom: 15px;
}

.section-subtitle{
    color: #6c757d;
    max-width: 700px;
    margin: auto;
}

/* =========================================
   CTA
========================================= */

.cta-section{
    background: linear-gradient(135deg,#0d6efd,#4f8cff);
    border-radius: 30px;
    padding: 70px 30px;
}

/* =========================================
   RESPONSIVE
========================================= */

@media(max-width:768px){

    .hero-title{
        font-size: 40px;
    }

    .hero-subtitle{
        font-size: 16px;
    }

}

</style>

<!-- HERO -->
<section class="hero-section text-white">

    <div class="container text-center">

        <span class="badge bg-primary px-4 py-2 mb-4">
            Sistem Informasi Modern
        </span>

        <h1 class="hero-title mb-4">
            Sistem Informasi <br>
            Peminjaman Alat
        </h1>

        <p class="hero-subtitle mb-5">
            Platform digital modern untuk pengelolaan
            peminjaman alat sekolah, laboratorium,
            dan inventaris secara cepat, aman,
            efisien, dan terintegrasi.
        </p>

        <div class="d-flex justify-content-center flex-wrap gap-3">

            <!-- LOGIN ADMIN -->
            <a href="/loginuser"
               class="btn btn-warning btn-modern">

                <i class="fas fa-user-shield me-2"></i>
                Login Admin

            </a>

            <!-- LOGIN PEMINJAM -->
            <a href="/loginpeminjam"
               class="btn btn-primary btn-modern">

                <i class="fas fa-user me-2"></i>
                Login Peminjam

            </a>

            <!-- REGISTER -->
            <a href="/registerpeminjam"
               class="btn btn-light btn-modern">

                <i class="fas fa-user-plus me-2"></i>
                Register

            </a>

        </div>

    </div>

</section>

<!-- FITUR -->
<section class="py-5 bg-light">

    <div class="container py-5">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Fitur Unggulan Sistem
            </h2>

            <p class="section-subtitle">
                Sistem dirancang untuk membantu proses
                pengelolaan inventaris dan peminjaman alat
                secara modern dan efisien.
            </p>

        </div>

        <div class="row">

            <!-- CARD 1 -->
            <div class="col-lg-4 mb-4">

                <div class="card feature-card h-100 shadow-sm">

                    <div class="card-body text-center p-5">

                        <div class="feature-icon bg-primary mb-4">
                            <i class="fas fa-tools"></i>
                        </div>

                        <h4 class="mb-3">
                            Data Alat
                        </h4>

                        <p class="text-muted">
                            Pengelolaan seluruh data alat
                            dan inventaris secara realtime.
                        </p>

                    </div>

                </div>

            </div>

            <!-- CARD 2 -->
            <div class="col-lg-4 mb-4">

                <div class="card feature-card h-100 shadow-sm">

                    <div class="card-body text-center p-5">

                        <div class="feature-icon bg-success mb-4">
                            <i class="fas fa-handshake"></i>
                        </div>

                        <h4 class="mb-3">
                            Peminjaman Online
                        </h4>

                        <p class="text-muted">
                            Proses peminjaman alat menjadi
                            lebih cepat dan praktis.
                        </p>

                    </div>

                </div>

            </div>

            <!-- CARD 3 -->
            <div class="col-lg-4 mb-4">

                <div class="card feature-card h-100 shadow-sm">

                    <div class="card-body text-center p-5">

                        <div class="feature-icon bg-danger mb-4">
                            <i class="fas fa-chart-line"></i>
                        </div>

                        <h4 class="mb-3">
                            Monitoring
                        </h4>

                        <p class="text-muted">
                            Monitoring transaksi dan laporan
                            secara realtime dan otomatis.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="pb-5">

    <div class="container">

        <div class="cta-section text-center text-white">

            <h2 class="fw-bold mb-4">
                Siap Menggunakan Sistem?
            </h2>

            <p class="mb-4">
                Gunakan sistem peminjaman alat modern
                untuk mempermudah pengelolaan inventaris.
            </p>

            <a href="/loginpeminjam"
               class="btn btn-light btn-modern">

                <i class="fas fa-arrow-right me-2"></i>
                Mulai Sekarang

            </a>

        </div>

    </div>

</section>

@endsection