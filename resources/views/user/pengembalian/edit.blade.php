@extends('layouts.appuser')

@section('title', 'Edit Pengembalian')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Edit Pengembalian</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<form action="{{ route('pengembalian.update', $data->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="form-group">
<label>Tanggal Pengembalian</label>

<input type="date"
name="tanggal_pengembalian"
value="{{ $data->tanggal_pengembalian }}"
class="form-control">
</div>

<div class="form-group">
<label>Keterlambatan</label>

<input type="number"
name="keterlambatan"
value="{{ $data->keterlambatan }}"
class="form-control">
</div>

<div class="form-group">
<label>Denda</label>

<input type="number"
name="denda"
value="{{ $data->denda }}"
class="form-control">
</div>

<div class="form-group">
<label>Kondisi Kembali</label>

<select name="kondisi_kembali"
class="form-control">

<option value="baik"
{{ $data->kondisi_kembali == 'baik' ? 'selected' : '' }}>
Baik
</option>

<option value="rusak"
{{ $data->kondisi_kembali == 'rusak' ? 'selected' : '' }}>
Rusak
</option>

</select>

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