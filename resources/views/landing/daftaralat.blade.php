@extends('layouts.apptamu')

@section('title', 'Daftar Alat')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">
        <h2 class="fw-bold">Daftar Alat</h2>
        <p class="text-muted">Seluruh alat yang tersedia</p>
    </div>

    <div class="row">

        @foreach($alat as $item)

        <div class="col-lg-4 col-md-6 mb-4">

            <div class="card shadow-sm border-0 h-100 alat-card">

                @if($item->foto)
                    <img src="{{ asset('storage/alat/' . $item->foto) }}"
                        class="card-img-top"
                        style="height:250px; object-fit:cover;"
                        alt="{{ $item->nama_alat }}">
                @else
                    <img src="https://via.placeholder.com/400x250?text=Foto+Tidak+Tersedia"
                        class="card-img-top"
                        style="height:250px; object-fit:cover;"
                        alt="Tidak ada foto">
                @endif

                <div class="card-body d-flex flex-column">

                    <h5 class="fw-bold mb-3">
                        {{ $item->nama_alat }}
                    </h5>

                    <div class="mb-2">
                        <strong>Kategori :</strong>
                        {{ $item->kategori->nama_kategori }}
                    </div>

                    <div class="mb-2">
                        <strong>Stok :</strong>
                        {{ $item->stok }}
                    </div>

                    <div class="mb-3">
                        <span class="badge bg-success">
                            {{ $item->status }}
                        </span>
                    </div>

                    <div class="mt-auto">
                        <a href="{{ route('login') }}"
                           class="btn btn-primary w-100">
                            Login Untuk Meminjam
                        </a>
                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

<style>
.alat-card{
    transition: all 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
}

.alat-card:hover{
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
}

.card-img-top{
    transition: 0.3s;
}

.alat-card:hover .card-img-top{
    transform: scale(1.03);
}
</style>

@endsection