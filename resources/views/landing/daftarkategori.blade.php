@extends('layouts.apptamu')

@section('title', 'Daftar Kategori')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Daftar Kategori Alat
        </h2>

        <p class="text-muted">
            Pilih kategori alat yang ingin dilihat
        </p>

    </div>

    <div class="row">

        @foreach($kategori as $item)

        <div class="col-md-4 mb-4">

            <div class="card shadow border-0 h-100">

                <div class="card-body text-center">

                    <i class="fas fa-layer-group fa-3x text-primary mb-3"></i>

                    <h4>
                        {{ $item->nama_kategori }}
                    </h4>

                    <p class="text-muted">
                        {{ $item->deskripsi }}
                    </p>

                    <a href="/kategori/{{ $item->id }}"
                       class="btn btn-primary">
                        Lihat Alat
                    </a>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection