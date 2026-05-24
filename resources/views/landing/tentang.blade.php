@extends('layouts.apptamu')

@section('title', 'Tentang')

@section('content')

<div class="container py-5">

    <div class="row align-items-center">

        <div class="col-md-6">

            <img src="{{ asset('dist/img/about.jpg') }}"
                 class="img-fluid rounded shadow">

        </div>

        <div class="col-md-6">

            <h2 class="fw-bold mb-4">
                Tentang Aplikasi
            </h2>

            <p class="text-muted">
                Sistem Informasi Peminjaman Alat dibuat untuk membantu
                pengelolaan alat sekolah agar proses peminjaman menjadi
                lebih efektif dan efisien.
            </p>

            <p class="text-muted">
                Aplikasi ini dibangun menggunakan Laravel 13,
                Bootstrap 5, dan AdminLTE.
            </p>

        </div>

    </div>

</div>

@endsection