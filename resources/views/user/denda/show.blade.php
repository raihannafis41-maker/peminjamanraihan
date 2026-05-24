@extends('layouts.appuser')

@section('title', 'Detail Denda')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Detail Denda</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<table class="table table-bordered">

<tr>
<th width="250">Nama Peminjam</th>
<td>{{ $data->peminjaman->user->nama ?? '-' }}</td>
</tr>

<tr>
<th>Nama Alat</th>
<td>{{ $data->peminjaman->alat->nama_alat ?? '-' }}</td>
</tr>

<tr>
<th>Keterlambatan</th>
<td>{{ $data->keterlambatan }} Hari</td>
</tr>

<tr>
<th>Denda</th>
<td>Rp {{ number_format($data->denda) }}</td>
</tr>

</table>

</div>

</div>

</section>

</div>

@endsection