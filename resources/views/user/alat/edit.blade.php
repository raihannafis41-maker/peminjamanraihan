@extends('layouts.appuser')

@section('title', 'Edit Alat')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <h1>Edit Alat</h1>
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

            <form action="{{ route('alat.update', $data->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control">
                        @foreach($kategori as $item)
                        <option value="{{ $item->id }}"
                            {{ $data->kategori_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Alat</label>
                    <input type="text"
                        name="nama_alat"
                        value="{{ $data->nama_alat }}"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Stok</label>
                    <input type="number"
                        name="stok"
                        value="{{ $data->stok }}"
                        class="form-control">
                </div>

                <div class="form-group">
                    <label>Kondisi</label>
                    <select name="kondisi_id" class="form-control">
                        @foreach($kondisi as $item)
                        <option value="{{ $item->id }}"
                            {{ $data->kondisi_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kondisi }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="tersedia"
                            {{ $data->status == 'tersedia' ? 'selected' : '' }}>
                            Tersedia
                        </option>

                        <option value="dipinjam"
                            {{ $data->status == 'dipinjam' ? 'selected' : '' }}>
                            Dipinjam
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Foto</label>

                    <input type="file" name="foto" class="form-control">

                    @if($data->foto)
                    <br>
                    <img src="{{ asset('storage/alat/' . $data->foto) }}"
                        width="120">
                    @endif
                </div>

                <button class="btn btn-warning">
                    Update
                </button>

            </form>

        </div>

    </div>

</section>

@endsection