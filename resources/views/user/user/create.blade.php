@extends('layouts.appuser')

@section('title', 'Tambah User')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <h1 class="fw-bold">
                Tambah User
            </h1>

            <a href="{{ route('user.index') }}"
               class="btn btn-secondary">

                <i class="fas fa-arrow-left"></i>
                Kembali

            </a>

        </div>

    </div>
</section>

<section class="content">

    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">

                <form action="{{ route('user.store') }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Nama
                        </label>

                        <input type="text"
                               name="nama"
                               class="form-control"
                               value="{{ old('nama') }}"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Username
                        </label>

                        <input type="text"
                               name="username"
                               class="form-control"
                               value="{{ old('username') }}"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Password
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Role
                        </label>

                        <select name="role"
                                class="form-control"
                                required>

                            <option value="">
                                -- Pilih Role --
                            </option>

                            <option value="admin">
                                Admin
                            </option>

                            <option value="petugas">
                                Petugas
                            </option>

                            <option value="peminjam">
                                Peminjam
                            </option>

                        </select>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Foto
                        </label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept="image/*">

                    </div>

                    <button type="submit"
                            class="btn btn-primary">

                        <i class="fas fa-save"></i>
                        Simpan

                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection