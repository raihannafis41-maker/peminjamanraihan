@extends('layouts.apptamu')

@section('title', 'Kategori')

@section('content')

<div class="container py-5">

    <!-- HEADER -->
    <h2 class="fw-bold mb-4">
        Kategori :
        <span class="text-primary">
            {{ $kategori->nama_kategori }}
        </span>
    </h2>

    <div class="row g-4">

        @forelse($alat as $item)

        <div class="col-md-4">

            <div class="card shadow-sm border-0 h-100 alat-card">

                <!-- GAMBAR -->
                @if($item->foto)
                    <img src="{{ asset('storage/alat/' . $item->foto) }}"
                         class="card-img-top"
                         style="height:250px; object-fit:cover;"
                         alt="{{ $item->nama_alat }}">
                @else
                    <img src="https://via.placeholder.com/400x250?text=Tidak+Ada+Foto"
                         class="card-img-top"
                         style="height:250px; object-fit:cover;"
                         alt="No Image">
                @endif

                <!-- BODY -->
                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold mb-2">
                        {{ $item->nama_alat }}
                    </h5>

                    <p class="mb-1">
                        <strong>Stok :</strong>
                        {{ $item->stok }}
                    </p>

                    <p class="mb-0">
                        <strong>Status :</strong>
                        <span class="badge bg-success">
                            {{ $item->status }}
                        </span>
                    </p>

                </div>

            </div>

        </div>

        @empty

        <div class="col-12 text-center py-5">

            <h5 class="text-muted">
                Tidak ada alat pada kategori ini
            </h5>

        </div>

        @endforelse

    </div>

</div>

<!-- STYLE TAMBAHAN -->
<style>

.alat-card {
    transition: 0.3s ease;
    border-radius: 12px;
    overflow: hidden;
}

.alat-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

</style>

@endsection