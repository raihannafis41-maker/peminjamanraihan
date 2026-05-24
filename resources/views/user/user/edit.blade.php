@extends('layouts.appuser')

@section('title', 'Edit User')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit User</h1>
        </div>
    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">

                <form action="{{ route('user.update', $data->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label>Nama</label>

                        <input type="text"
                               name="nama"
                               value="{{ $data->nama }}"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Username</label>

                        <input type="text"
                               name="username"
                               value="{{ $data->username }}"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Role</label>

                        <select name="role"
                                class="form-control">

                            <option value="admin"
                                {{ $data->role == 'admin' ? 'selected' : '' }}>
                                Admin
                            </option>

                            <option value="petugas"
                                {{ $data->role == 'petugas' ? 'selected' : '' }}>
                                Petugas
                            </option>

                            <option value="peminjam"
                                {{ $data->role == 'peminjam' ? 'selected' : '' }}>
                                Peminjam
                            </option>

                        </select>
                    </div>

                    <button class="btn btn-warning">
                        Update
                    </button>

                </form>

            </div>

        </div>

    </section>

</div>

@endsection