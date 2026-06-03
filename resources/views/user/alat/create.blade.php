@extends('layouts.appuser')

@section('title', 'Tambah Alat')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <h1>Tambah Alat</h1>
    </div>
</section>

<section class="content">

    <div class="card">

        <div class="card-header d-flex justify-content-between">
            <a href="{{ route('alat.index') }}" class="btn btn-secondary">
                ← Kembali
            </a>
        </div>

        <div class="card-body">

            <form action="{{ route('alat.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control">
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama_kategori }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Alat</label>
                    <input type="text" name="nama_alat" class="form-control">
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" name="stok" class="form-control">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <select name="kondisi_id" class="form-control">
                        <option value="">-- Pilih Kondisi --</option>
                        @foreach($kondisi as $item)
                            <option value="{{ $item->id }}">
                                {{ $item->nama_kondisi }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="tersedia" selected>Tersedia</option>
                        <option value="dipinjam">Dipinjam</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button class="btn btn-primary">
                    Simpan
                </button>

            </form>

        </div>

    </div>

</section>

@endsection