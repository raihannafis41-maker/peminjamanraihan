@extends('layouts.appuser')

@section('title', 'Detail Alat')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Detail Alat</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<table class="table table-bordered">

<tr>
<th width="200">Kategori</th>
<td>{{ $data->kategori->nama_kategori ?? '-' }}</td>
</tr>

<tr>
<th>Nama Alat</th>
<td>{{ $data->nama_alat }}</td>
</tr>

<tr>
<th>Stok</th>
<td>{{ $data->stok }}</td>
</tr>

<tr>
<th>Kondisi</th>
<td>{{ $data->kondisi }}</td>
</tr>

<tr>
<th>Status</th>
<td>{{ $data->status }}</td>
</tr>

<tr>
<th>Foto</th>

<td>

@if($data->foto)

<img src="{{ asset('uploads/alat/' . $data->foto) }}"
width="150">

@endif

</td>

</tr>

</table>

</div>

</div>

</section>

</div>

@endsection