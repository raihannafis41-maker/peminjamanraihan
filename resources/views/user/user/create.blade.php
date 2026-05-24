@extends('layouts.appuser')

@section('title', 'Tambah User')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Tambah User</h1>
        </div>
    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">

                <form action="{{ route('user.store') }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label>Nama</label>

                        <input type="text"
                               name="nama"
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>

                        <input type="text"
                               name="username"
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>

                        <input type="password"
                               name="password"
                               class="form-control"
                               required>
                    </div>

                    <div class="form-group">
                        <label>Role</label>

                        <select name="role"
                                class="form-control"
                                required>

                            <option value="">-- Pilih Role --</option>
                            <option value="admin">Admin</option>
                            <option value="petugas">Petugas</option>
                            <option value="peminjam">Peminjam</option>

                        </select>
                    </div>

                    <button class="btn btn-primary">
                        Simpan
                    </button>

                </form>

            </div>

        </div>

    </section>

</div>

@endsection