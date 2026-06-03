@extends('layouts.appuser')

@section('title', 'Edit Peminjam')

@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Peminjam</h1>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-header bg-warning">
                    Form Edit Peminjam
                </div>

                <div class="card-body">

                    <form action="{{ route('peminjam.update', $data->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="mb-3">

                            <label>Nama</label>

                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   value="{{ $data->nama }}"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   value="{{ $data->email }}"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>Password (opsional)</label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Kosongkan jika tidak diubah">

                        </div>

                        <button class="btn btn-success">
                            Update
                        </button>

                        <a href="/master/peminjam" class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection