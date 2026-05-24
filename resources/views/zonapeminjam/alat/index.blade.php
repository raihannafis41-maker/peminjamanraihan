@extends('layouts.apppeminjam')

@section('title', 'Daftar Alat')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <h1>
            Daftar Alat
        </h1>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <div class="row">

            @forelse($data as $item)

            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100">

                    <div class="card-body">

                        <h4 class="mb-3">

                            {{ $item->nama_alat }}

                        </h4>

                        <p class="mb-2">

                            <strong>Kategori :</strong>
                            {{ $item->kategori->nama_kategori ?? '-' }}

                        </p>

                        <p class="mb-2">

                            <strong>Stok :</strong>
                            {{ $item->stok }}

                        </p>

                        <p class="mb-3">

                            <strong>Status :</strong>

                            <span class="badge badge-success">

                                {{ $item->status }}

                            </span>

                        </p>

                        <a href="{{ route('zonapeminjam.alat.show', $item->id) }}"
                            class="btn btn-info btn-sm">

                            Detail

                        </a>

                    </div>

                </div>

            </div>

            @empty

            <div class="col-12">

                <div class="alert alert-warning">

                    Data alat belum tersedia

                </div>

            </div>

            @endforelse

        </div>

    </div>

</section>

@endsection