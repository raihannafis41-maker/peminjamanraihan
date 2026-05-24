@extends('layouts.appuser')

@section('title', 'Tambah Denda')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Tambah Denda</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<form action="{{ route('denda.store') }}"
method="POST">

@csrf

<div class="form-group">
<label>Peminjaman</label>

<select name="peminjaman_id"
class="form-control">

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

<button class="btn btn-primary">
Simpan
</button>

</form>

</div>

</div>

</section>

</div>

@endsection