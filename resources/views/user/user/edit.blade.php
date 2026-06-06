@extends('layouts.appuser')

@section('title', 'Edit User')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <h1 class="fw-bold">
            Edit User
        </h1>

    </div>
</section>

<section class="content">

    <div class="container-fluid">

        <div class="card shadow">

            <div class="card-body">

                <form action="{{ route('user.update', $data->id) }}"
                      method="POST"
                      enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="text-center mb-4">

                        @if($data->foto)

                            <img src="{{ asset('storage/user/'.$data->foto) }}"
                                 width="120"
                                 height="120"
                                 class="rounded-circle border"
                                 style="object-fit:cover;">

                        @else

                            <img src="https://ui-avatars.com/api/?name={{ urlencode($data->nama) }}&background=0D8ABC&color=fff"
                                 width="120"
                                 height="120"
                                 class="rounded-circle border">

                        @endif

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Nama
                        </label>

                        <input type="text"
                               name="nama"
                               value="{{ $data->nama }}"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Username
                        </label>

                        <input type="text"
                               name="username"
                               value="{{ $data->username }}"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Password Baru
                        </label>

                        <input type="password"
                               name="password"
                               class="form-control">

                        <small class="text-muted">
                            Kosongkan jika tidak ingin mengubah password.
                        </small>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Role
                        </label>

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

                    <div class="mb-3">

                        <label class="form-label">
                            Ganti Foto
                        </label>

                        <input type="file"
                               name="foto"
                               class="form-control"
                               accept="image/*">

                    </div>

                    <button type="submit"
                            class="btn btn-warning">

                        <i class="fas fa-save"></i>
                        Update

                    </button>

                    <a href="{{ route('user.index') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection