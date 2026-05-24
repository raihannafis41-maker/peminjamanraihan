@extends('layouts.apptamu')

@section('title', 'Daftar Alat')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Daftar Alat
        </h2>

        <p class="text-muted">
            Seluruh alat yang tersedia
        </p>

    </div>

    <div class="row">

        @foreach($alat as $item)

        <div class="col-md-4 mb-4">

            <div class="card shadow border-0 h-100">

                <img src="{{ asset('uploads/alat/' . $item->foto) }}"
                     class="card-img-top"
                     style="height:250px; object-fit:cover;">

                <div class="card-body">

                    <h5 class="fw-bold">
                        {{ $item->nama_alat }}
                    </h5>

                    <p>
                        Kategori :
                        {{ $item->kategori->nama_kategori }}
                    </p>

                    <p>
                        Stok :
                        {{ $item->stok }}
                    </p>

                    <span class="badge bg-success">
                        {{ $item->status }}
                    </span>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection