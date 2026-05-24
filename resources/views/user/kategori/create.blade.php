@extends('layouts.appuser')

@section('title', 'Tambah Kategori')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Tambah Kategori</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<form action="{{ route('kategori.store') }}"
method="POST">

@csrf

<div class="form-group">
<label>Nama Kategori</label>

<input type="text"
name="nama_kategori"
class="form-control">
</div>

<div class="form-group">
<label>Deskripsi</label>

<textarea name="deskripsi"
class="form-control"></textarea>
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