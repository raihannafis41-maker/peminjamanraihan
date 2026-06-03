@extends('layouts.apppeminjam')

@section('title', 'Ajukan Peminjaman')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <h1 class="fw-bold">
            Ajukan Peminjaman Alat
        </h1>

    </div>
</section>

<section class="content">

    <div class="container-fluid">

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>
        @endif

        <div class="card shadow border-0">

            <div class="card-header bg-primary">

                <h3 class="card-title text-white">

                    Form Peminjaman Alat

                </h3>

            </div>

            <form
                action="{{ route('zonapeminjam.pinjam.store') }}"
                method="POST">

                @csrf

                <div class="card-body">

                    <input
                        type="hidden"
                        name="alat_id"
                        value="{{ $alat->id }}">

                    <div class="mb-3">

                        <label class="form-label">

                            Nama Alat

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $alat->nama_alat }}"
                            readonly>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Stok Tersedia

                        </label>

                        <input
                            type="text"
                            class="form-control"
                            value="{{ $alat->stok_tersedia }}"
                            readonly>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Tanggal Pinjam

                        </label>

                        <input
                            type="date"
                            name="tanggal_pinjam"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Tanggal Kembali

                        </label>

                        <input
                            type="date"
                            name="tanggal_kembali"
                            class="form-control"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Jumlah Pinjam

                        </label>

                        <input
                            type="number"
                            name="jumlah"
                            class="form-control"
                            min="1"
                            max="{{ $alat->stok_tersedia }}"
                            required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">

                            Catatan

                        </label>

                        <textarea
                            name="catatan"
                            class="form-control"
                            rows="3"
                            placeholder="Masukkan alasan atau keperluan peminjaman"></textarea>

                    </div>

                </div>

                <div class="card-footer">

                    <button
                        type="submit"
                        class="btn btn-primary">

                        <i class="fas fa-save me-1"></i>
                        Ajukan Peminjaman

                    </button>

                    <a
                        href="{{ route('zonapeminjam.alat') }}"
                        class="btn btn-secondary">

                        <i class="fas fa-arrow-left me-1"></i>
                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</section>

@endsection