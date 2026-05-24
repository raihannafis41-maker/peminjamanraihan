@extends('layouts.appuser')

@section('title', 'Edit Kategori')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Edit Kategori</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<form action="{{ route('kategori.update', $data->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="form-group">
<label>Nama Kategori</label>

<input type="text"
name="nama_kategori"
value="{{ $data->nama_kategori }}"
class="form-control">
</div>

<div class="form-group">
<label>Deskripsi</label>

<textarea name="deskripsi"
class="form-control">{{ $data->deskripsi }}</textarea>
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