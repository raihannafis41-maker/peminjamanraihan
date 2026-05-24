@extends('layouts.appuser')

@section('title', 'Data Kategori')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Data Kategori</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-header">
<a href="{{ route('kategori.create') }}" class="btn btn-primary">
Tambah Kategori
</a>
</div>

<div class="card-body">

<table class="table table-bordered">

<thead>
<tr>
<th>No</th>
<th>Nama Kategori</th>
<th>Deskripsi</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>

@foreach($data as $item)

<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $item->nama_kategori }}</td>
<td>{{ $item->deskripsi }}</td>

<td>

<a href="{{ route('kategori.show', $item->id) }}"
class="btn btn-info btn-sm">
Detail
</a>

<a href="{{ route('kategori.edit', $item->id) }}"
class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('kategori.destroy', $item->id) }}"
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