@extends('layouts.appuser')

@section('title', 'Data Alat')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Data Alat</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-header">
<a href="{{ route('alat.create') }}"
class="btn btn-primary">
Tambah Alat
</a>
</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<thead>
<tr>
<th>No</th>
<th>Kategori</th>
<th>Nama Alat</th>
<th>Stok</th>
<th>Kondisi</th>
<th>Status</th>
<th width="220">Aksi</th>
</tr>
</thead>

<tbody>

@foreach($data as $item)

<tr>

<td>{{ $loop->iteration }}</td>
<td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
<td>{{ $item->nama_alat }}</td>
<td>{{ $item->stok }}</td>
<td>{{ $item->kondisi }}</td>
<td>{{ $item->status }}</td>

<td>

<a href="{{ route('alat.show', $item->id) }}"
class="btn btn-info btn-sm">
Detail
</a>

<a href="{{ route('alat.edit', $item->id) }}"
class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('alat.destroy', $item->id) }}"
method="POST"
style="display:inline-block;">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm">
Hapus
</button>

</form>

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>

</section>

</div>

@endsection