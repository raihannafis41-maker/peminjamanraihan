@extends('layouts.appuser')

@section('title', 'Tambah Pengembalian')

@section('content')


<section class="content-header">
<div class="container-fluid">
<h1>Tambah Pengembalian</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<form action="{{ route('pengembalian.store') }}"
method="POST">

@csrf

<div class="form-group">
<label>Peminjaman</label>

<select name="peminjaman_id"
class="form-control">

<option value="">-- Pilih Peminjaman --</option>

@foreach($peminjaman as $item)

<option value="{{ $item->id }}">
{{ $item->user->nama ?? '-' }}
- 
{{ $item->alat->nama_alat ?? '-' }}
</option>

@endforeach

</select>

</div>

<div class="form-group">
<label>Tanggal Pengembalian</label>

<input type="date"
name="tanggal_pengembalian"
class="form-control">
</div>

<div class="form-group">
<label>Keterlambatan</label>

<input type="number"
name="keterlambatan"
class="form-control">
</div>

<div class="form-group">
<label>Denda</label>

<input type="number"
name="denda"
class="form-control">
</div>

<div class="form-group">
<label>Kondisi Kembali</label>

<select name="kondisi_kembali"
class="form-control">

<option value="baik">Baik</option>
<option value="rusak">Rusak</option>

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