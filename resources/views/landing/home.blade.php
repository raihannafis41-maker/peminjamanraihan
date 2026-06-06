@extends('layouts.apptamu')

@section('title', 'Home')

@section('content')

<style>
    :root {
        --primary: #2563eb;
        --secondary: #3b82f6;
        --success: #10b981;
        --dark: #0f172a;
        --light: #f8fafc;
    }

    body {
        background: #f8fafc;
    }

    /* =========================
   HERO
========================= */

    .hero-section {
        min-height: 100vh;
        background: linear-gradient(135deg,
            rgba(15, 23, 42, .92),
            rgba(37, 99, 235, .80)),
        url("{{ asset('foto/banner/cafe.jpeg') }}");
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: center;
        position: relative;
    }

    .hero-title {
        font-size: 70px;
        font-weight: 800;
        line-height: 1.1;
    }

    .hero-subtitle {
        font-size: 20px;
        max-width: 850px;
        margin: auto;
        color: #e5e7eb;
    }

    .hero-badge {
        padding: 12px 24px;
        border-radius: 50px;
        background: rgba(255, 255, 255, .15);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, .2);
    }

    /* =========================
   BUTTON
========================= */

    .btn-modern {
        padding: 14px 35px;
        border-radius: 50px;
        font-weight: 600;
        transition: .3s;
    }

    .btn-modern:hover {
        transform: translateY(-4px);
    }

    /* =========================
   STATISTIC
========================= */

    .stat-card {
        background: white;
        border: none;
        border-radius: 20px;
        padding: 30px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        transition: .3s;
    }

    .stat-card:hover {
        transform: translateY(-8px);
    }

    .stat-number {
        font-size: 40px;
        font-weight: 800;
        color: var(--primary);
    }

    /* =========================
   FEATURE
========================= */

    .feature-card {
        border: none;
        border-radius: 25px;
        transition: .3s;
        overflow: hidden;
        height: 100%;
        box-shadow: 0 10px 25px rgba(0, 0, 0, .06);
    }

    .feature-card:hover {
        transform: translateY(-10px);
    }

    .feature-icon {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        font-size: 35px;
        color: white;
    }

    /* =========================
   SECTION
========================= */

    .section-title {
        font-weight: 800;
        margin-bottom: 15px;
    }

    .section-subtitle {
        color: #6b7280;
        max-width: 700px;
        margin: auto;
    }

    /* =========================
   TIMELINE
========================= */

    .step-box {
        background: white;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
        transition: .3s;
    }

    .step-box:hover {
        transform: translateY(-6px);
    }

    .step-number {
        width: 60px;
        height: 60px;
        background: var(--primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        margin: auto auto 15px;
    }

    /* =========================
   ADVANTAGE
========================= */

    .advantage-box {
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, .06);
    }

    /* =========================
   CTA
========================= */

    .cta-section {
        background: linear-gradient(135deg,
                #2563eb,
                #3b82f6);
        border-radius: 30px;
        padding: 80px 30px;
    }

    /* =========================
   RESPONSIVE
========================= */

    @media(max-width:768px) {

        .hero-title {
            font-size: 42px;
        }

        .hero-subtitle {
            font-size: 16px;
        }

    }
</style>

<!-- HERO -->

<section class="hero-section text-white">

    ```
    <div class="container text-center">

        <span class="hero-badge">
            Sistem Informasi Inventaris Sekolah
        </span>

        <h1 class="hero-title my-4">
            Sistem Informasi <br>
            Peminjaman Alat Sekolah
        </h1>

        <p class="hero-subtitle mb-5">
            Platform digital modern untuk mengelola inventaris,
            laboratorium, multimedia, dan alat sekolah secara
            cepat, aman, efisien, dan terintegrasi.
        </p>

        <div class="d-flex justify-content-center flex-wrap gap-3">

            <a href="/loginuser"
                class="btn btn-warning btn-modern">
                <i class="fas fa-user-shield me-2"></i>
                Login Admin
            </a>

            <a href="/loginpeminjam"
                class="btn btn-primary btn-modern">
                <i class="fas fa-user me-2"></i>
                Login Peminjam
            </a>

            <a href="/registerpeminjam"
                class="btn btn-light btn-modern">
                <i class="fas fa-user-plus me-2"></i>
                Register
            </a>

        </div>

    </div>
    ```

</section>

<!-- STATISTIK -->

<section class="py-5">

    ```
    <div class="container">

        <div class="row g-4">

            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">500+</div>
                    <p class="mb-0">Total Alat</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">1200+</div>
                    <p class="mb-0">Peminjaman</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">100+</div>
                    <p class="mb-0">Pengguna Aktif</p>
                </div>
            </div>

            <div class="col-md-3">
                <div class="stat-card">
                    <div class="stat-number">98%</div>
                    <p class="mb-0">Keberhasilan</p>
                </div>
            </div>

        </div>

    </div>
    ```

</section>

<!-- FITUR -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Fitur Unggulan Sistem
            </h2>

            <p class="section-subtitle">
                Membantu sekolah mengelola inventaris secara
                digital dan profesional.
            </p>

        </div>

        <div class="row g-4">

            @php
            $fitur = [
            ['icon'=>'tools','color'=>'primary','judul'=>'Data Inventaris'],
            ['icon'=>'laptop','color'=>'success','judul'=>'Peminjaman Online'],
            ['icon'=>'user-check','color'=>'danger','judul'=>'Persetujuan Cepat'],
            ['icon'=>'chart-bar','color'=>'warning','judul'=>'Laporan Otomatis'],
            ['icon'=>'eye','color'=>'info','judul'=>'Monitoring'],
            ['icon'=>'shield-alt','color'=>'secondary','judul'=>'Keamanan Data']
            ];
            @endphp

            @foreach($fitur as $f)

            <div class="col-lg-4">

                <div class="card feature-card">

                    <div class="card-body text-center p-5">

                        <div class="feature-icon bg-{{ $f['color'] }} mb-4">
                            <i class="fas fa-{{ $f['icon'] }}"></i>
                        </div>

                        <h4>{{ $f['judul'] }}</h4>

                        <p class="text-muted">
                            Fitur modern yang dirancang untuk membantu
                            pengelolaan inventaris sekolah secara efektif.
                        </p>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</section>

<!-- ALUR -->

<section class="py-5">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Alur Peminjaman Alat
            </h2>

            <p class="section-subtitle">
                Proses peminjaman dibuat sederhana dan mudah digunakan.
            </p>

        </div>

        <div class="row g-4">

            <div class="col-lg-2 col-md-4">
                <div class="step-box text-center">
                    <div class="step-number">1</div>
                    Login
                </div>
            </div>

            <div class="col-lg-2 col-md-4">
                <div class="step-box text-center">
                    <div class="step-number">2</div>
                    Pilih Alat
                </div>
            </div>

            <div class="col-lg-2 col-md-4">
                <div class="step-box text-center">
                    <div class="step-number">3</div>
                    Ajukan
                </div>
            </div>

            <div class="col-lg-2 col-md-4">
                <div class="step-box text-center">
                    <div class="step-number">4</div>
                    Disetujui
                </div>
            </div>

            <div class="col-lg-2 col-md-4">
                <div class="step-box text-center">
                    <div class="step-number">5</div>
                    Ambil
                </div>
            </div>

            <div class="col-lg-2 col-md-4">
                <div class="step-box text-center">
                    <div class="step-number">6</div>
                    Kembalikan
                </div>
            </div>

        </div>

    </div>

</section>

<!-- KEUNGGULAN -->

<section class="py-5 bg-light">

    <div class="container">

        <div class="text-center mb-5">

            <h2 class="section-title">
                Mengapa Memilih Sistem Ini?
            </h2>

        </div>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="advantage-box">
                    ✅ Mudah Digunakan
                </div>
            </div>

            <div class="col-md-4">
                <div class="advantage-box">
                    ✅ Monitoring Realtime
                </div>
            </div>

            <div class="col-md-4">
                <div class="advantage-box">
                    ✅ Laporan Otomatis
                </div>
            </div>

            <div class="col-md-4">
                <div class="advantage-box">
                    ✅ Data Aman
                </div>
            </div>

            <div class="col-md-4">
                <div class="advantage-box">
                    ✅ Responsif Mobile
                </div>
            </div>

            <div class="col-md-4">
                <div class="advantage-box">
                    ✅ Multi User
                </div>
            </div>

        </div>

    </div>

</section>

<!-- CTA -->

<section class="py-5">

    <div class="container">

        <div class="cta-section text-center text-white">

            <h2 class="fw-bold display-5 mb-3">
                Siap Menggunakan Sistem?
            </h2>

            <p class="fs-5 mb-4">
                Digitalisasi pengelolaan inventaris sekolah
                menjadi lebih cepat, modern, dan profesional.
            </p>

            <a href="/loginpeminjam"
                class="btn btn-light btn-modern">

                <i class="fas fa-rocket me-2"></i>
                Mulai Sekarang

            </a>

        </div>

    </div>

</section>

@endsection