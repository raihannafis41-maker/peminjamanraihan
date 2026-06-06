@extends('layouts.apptamu')

@section('title', 'Tentang')

@section('content')

<div class="container py-5">

    <div class="row align-items-center g-5">

        <!-- GAMBAR -->
        <div class="col-md-6 text-center">

            <img src="{{ asset('dist/img/about.jpg') }}"
                 class="img-fluid rounded-4 shadow-sm"
                 alt="Tentang Aplikasi">

        </div>

        <!-- TEXT -->
        <div class="col-md-6">

            <h2 class="fw-bold mb-3">
                Tentang Aplikasi
            </h2>

            <p class="text-muted mb-3">
                Sistem Informasi Peminjaman Alat dibuat untuk membantu
                pengelolaan alat sekolah agar proses peminjaman menjadi
                lebih efektif dan efisien.
            </p>

            <p class="text-muted mb-0">
                Aplikasi ini dibangun menggunakan <strong>Laravel 13</strong>,
                <strong>Bootstrap 5</strong>, dan <strong>AdminLTE</strong>.
            </p>

        </div>

    </div>

</div>

@endsection