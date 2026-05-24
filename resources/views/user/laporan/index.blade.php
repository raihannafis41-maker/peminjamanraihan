@extends('layouts.appuser')

@section('title', 'Laporan')

@section('content')

<div class="container-fluid">

    <div class="row mb-3">
        <div class="col-12">
            <h3 class="fw-bold">
                Menu Laporan
            </h3>
        </div>
    </div>

    <div class="row">

        <div class="col-md-4">
            <div class="card shadow-sm">

                <div class="card-body text-center">

                    <h5>Laporan Peminjaman</h5>

                    <a href="/laporan/peminjaman"
                       class="btn btn-primary mt-3">
                        Buka Laporan
                    </a>

                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">

                <div class="card-body text-center">

                    <h5>Laporan Pengembalian</h5>

                    <a href="/laporan/pengembalian"
                       class="btn btn-success mt-3">
                        Buka Laporan
                    </a>

                </div>

            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">

                <div class="card-body text-center">

                    <h5>Laporan Denda</h5>

                    <a href="/laporan/denda"
                       class="btn btn-danger mt-3">
                        Buka Laporan
                    </a>

                </div>

            </div>
        </div>

    </div>

</div>

@endsection