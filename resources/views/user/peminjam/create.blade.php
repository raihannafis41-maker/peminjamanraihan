@extends('layouts.appuser')

@section('title', 'Tambah Peminjam')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <h1 class="fw-bold">Tambah Peminjam</h1>
    </div>
</section>

<section class="content">

    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">

                <form action="{{ route('peminjam.store') }}"
                    method="POST"
                    enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">
                        <label>Nama</label>
                        <input type="text"
                            name="nama"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Username</label>
                        <input type="text"
                            name="username"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password"
                            name="password"
                            class="form-control"
                            required>
                    </div>

                    <div class="mb-3">
                        <label>Foto</label>
                        <input type="file"
                            name="foto"
                            class="form-control"
                            accept="image/*">
                    </div>

                    <button type="submit"
                        class="btn btn-primary">

                        Simpan

                    </button>

                    <a href="{{ route('peminjam.index') }}"
                        class="btn btn-secondary">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection