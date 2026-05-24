@extends('layouts.apptamu')

@section('title', 'Kategori')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4">
        Kategori :
        {{ $kategori->nama_kategori }}
    </h2>

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
                        Stok :
                        {{ $item->stok }}
                    </p>

                    <p>
                        Status :
                        <span class="badge bg-success">
                            {{ $item->status }}
                        </span>
                    </p>

                </div>

            </div>

        </div>

        @endforeach

    </div>

</div>

@endsection