@extends('layouts.apptamu')

@section('title', 'Daftar Kategori')

@section('content')

<div class="container py-5">

    <!-- HEADER -->
    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Daftar Kategori Alat
        </h2>

        <p class="text-muted">
            Pilih kategori alat yang ingin dilihat
        </p>

    </div>

    <div class="row g-4">

        @forelse($kategori as $item)

        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100 kategori-card">

                <div class="card-body text-center p-4">

                    <!-- ICON -->
                    <i class="fas fa-layer-group fa-3x text-primary mb-3"></i>

                    <!-- TITLE -->
                    <h4 class="fw-bold mb-2">
                        {{ $item->nama_kategori }}
                    </h4>

                    <!-- DESCRIPTION -->
                    <p class="text-muted mb-4">
                        {{ $item->deskripsi }}
                    </p>

                    <!-- BUTTON -->
                    <a href="/kategori/{{ $item->id }}"
                       class="btn btn-primary px-4">
                        Lihat Alat
                    </a>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12 text-center py-5">

            <h5 class="text-muted">
                Tidak ada kategori tersedia
            </h5>

        </div>

        @endforelse

    </div>

</div>

<!-- STYLE TAMBAHAN -->
<style>

.kategori-card {
    border-radius: 14px;
    transition: 0.3s ease;
}

.kategori-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 28px rgba(0,0,0,0.15) !important;
}

</style>

@endsection