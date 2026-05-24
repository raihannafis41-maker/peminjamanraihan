@extends('layouts.appuser')

@section('title', 'Data Pengembalian')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Data Pengembalian</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-header">

<a href="{{ route('pengembalian.create') }}"
class="btn btn-primary">
Tambah Pengembalian
</a>

</div>

<div class="card-body">

<table class="table table-bordered table-striped">

<thead>

<tr>
<th>No</th>
<th>Peminjam</th>
<th>Alat</th>
<th>Tanggal Pengembalian</th>
<th>Keterlambatan</th>
<th>Denda</th>
<th>Kondisi</th>
<th width="220">Aksi</th>
</tr>

</thead>

<tbody>

@foreach($data as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>
{{ $item->peminjaman->user->nama ?? '-' }}
</td>

<td>
{{ $item->peminjaman->alat->nama_alat ?? '-' }}
</td>

<td>{{ $item->tanggal_pengembalian }}</td>

<td>{{ $item->keterlambatan }} Hari</td>

<td>Rp {{ number_format($item->denda) }}</td>

<td>{{ $item->kondisi_kembali }}</td>

<td>

<a href="{{ route('pengembalian.show', $item->id) }}"
class="btn btn-info btn-sm">
Detail
</a>

<a href="{{ route('pengembalian.edit', $item->id) }}"
class="btn btn-warning btn-sm">
Edit
</a>

<form action="{{ route('pengembalian.destroy', $item->id) }}"
method="POST"
style="display:inline-block;">

@csrf
@method('DELETE')

<button class="btn btn-danger btn-sm"
onclick="return confirm('Hapus data?')">
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