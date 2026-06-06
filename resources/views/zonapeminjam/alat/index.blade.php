@extends('layouts.apppeminjam')

@section('title', 'Daftar Alat')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="font-weight-bold">
                <i class="fas fa-toolbox text-primary"></i>
                Daftar Alat
            </h1>
        </div>
    </div>
</section>

<section class="content">

    <div class="container-fluid">

        {{-- Search --}}
        <div class="card shadow-sm mb-4">
            <div class="card-body">

                <form method="GET">

                    <div class="input-group">

                        <input type="text"
                               name="search"
                               class="form-control"
                               placeholder="Cari nama alat..."
                               value="{{ request('search') }}">

                        <div class="input-group-append">

                            <button class="btn btn-primary">
                                <i class="fas fa-search"></i>
                                Cari
                            </button>

                        </div>

                    </div>

                </form>

            </div>
        </div>

        <div class="row">

            @forelse($data as $item)

            <div class="col-lg-4 col-md-6 mb-4">

                <div class="card shadow border-0 h-100 alat-card">

                    {{-- FOTO ALAT --}}
                    <div class="text-center pt-3">

                        @if($item->foto)

                            <img src="{{ asset('storage/alat/'.$item->foto) }}"
                                 alt="{{ $item->nama_alat }}"
                                 class="img-fluid rounded"
                                 style="height:180px; width:100%; object-fit:cover;">

                        @else

                            <img src="https://via.placeholder.com/250x180?text=Foto+Alat"
                                 alt="No Image"
                                 class="img-fluid rounded"
                                 style="height:180px; width:100%; object-fit:cover;">

                        @endif

                    </div>

                    <div class="card-body">

                        <h4 class="font-weight-bold text-primary">
                            {{ $item->nama_alat }}
                        </h4>

                        <hr>

                        <p class="mb-2">
                            <i class="fas fa-tags text-info"></i>
                            <strong>Kategori :</strong>
                            {{ $item->kategori->nama_kategori ?? '-' }}
                        </p>

                        <p class="mb-2">
                            <i class="fas fa-boxes text-warning"></i>
                            <strong>Stok :</strong>

                            @if($item->stok > 10)

                                <span class="badge badge-success">
                                    {{ $item->stok }} Unit
                                </span>

                            @elseif($item->stok > 0)

                                <span class="badge badge-warning">
                                    {{ $item->stok }} Unit
                                </span>

                            @else

                                <span class="badge badge-danger">
                                    Habis
                                </span>

                            @endif

                        </p>

                        <p class="mb-3">

                            <i class="fas fa-info-circle"></i>
                            <strong>Status :</strong>

                            @if(strtolower($item->status) == 'tersedia')

                                <span class="badge badge-success">
                                    Tersedia
                                </span>

                            @elseif(strtolower($item->status) == 'dipinjam')

                                <span class="badge badge-warning">
                                    Dipinjam
                                </span>

                            @else

                                <span class="badge badge-secondary">
                                    {{ $item->status }}
                                </span>

                            @endif

                        </p>

                    </div>

                    <div class="card-footer bg-white border-0">

                        <a href="{{ route('zonapeminjam.alat.show', $item->id) }}"
                           class="btn btn-primary btn-block">

                            <i class="fas fa-eye"></i>
                            Lihat Detail

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="card shadow-sm">

                    <div class="card-body text-center py-5">

                        <i class="fas fa-toolbox fa-4x text-muted mb-3"></i>

                        <h4>
                            Belum Ada Data Alat
                        </h4>

                        <p class="text-muted">
                            Saat ini belum terdapat alat yang tersedia.
                        </p>

                    </div>

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>

<style>

.alat-card{
    transition: all .3s ease;
}

.alat-card:hover{
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,.15) !important;
}

</style>

@endsection