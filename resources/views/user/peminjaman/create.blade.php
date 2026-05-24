@extends('layouts.appuser')

@section('title', 'Tambah Peminjaman')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Tambah Peminjaman</h1>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('peminjaman.store') }}"
                          method="POST">

                        @csrf

                        <div class="form-group">
                            <label>ID User</label>
                            <input type="number"
                                   name="user_id"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>ID Alat</label>
                            <input type="number"
                                   name="alat_id"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Pinjam</label>
                            <input type="date"
                                   name="tanggal_pinjam"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Tanggal Kembali</label>
                            <input type="date"
                                   name="tanggal_kembali"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number"
                                   name="jumlah"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Status</label>

                            <select name="status"
                                    class="form-control">

                                <option value="pending">
                                    Pending
                                </option>

                                <option value="approved">
                                    Approved
                                </option>

                            </select>

                        </div>

                        <button class="btn btn-primary">
                            Simpan
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection