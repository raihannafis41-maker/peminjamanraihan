@extends('layouts.appuser')

@section('title', 'Tambah Kondisi')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Tambah Kondisi</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<form action="{{ route('kondisi.store') }}"
method="POST">

@csrf

<div class="form-group">
<label>Nama Kondisi</label>

<input type="text"
name="nama_kondisi"
class="form-control"
required>
</div>

<div class="form-group">
<label>Keterangan</label>

<textarea name="keterangan"
class="form-control"
rows="5"></textarea>
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