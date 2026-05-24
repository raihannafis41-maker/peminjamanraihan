@extends('layouts.apppeminjam')

@section('title', 'Edit Peminjaman')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <h1 class="fw-bold">
            Edit Peminjaman
        </h1>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <div class="card shadow border-0">

            <div class="card-body">

                <form action="{{ route('peminjaman.update', $data->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">

                        <label>
                            Tanggal Pinjam
                        </label>

                        <input type="date"
                               name="tanggal_pinjam"
                               value="{{ $data->tanggal_pinjam }}"
                               class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>
                            Tanggal Kembali
                        </label>

                        <input type="date"
                               name="tanggal_kembali"
                               value="{{ $data->tanggal_kembali }}"
                               class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>
                            Jumlah
                        </label>

                        <input type="number"
                               name="jumlah"
                               value="{{ $data->jumlah }}"
                               class="form-control">

                    </div>

                    <button class="btn btn-warning">
                        Update
                    </button>

                    <a href="{{ route('peminjaman.index') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection