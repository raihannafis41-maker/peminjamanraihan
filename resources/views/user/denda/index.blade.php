@extends('layouts.appuser')

@section('title', 'Data Denda')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Data Denda</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<table class="table table-bordered table-striped">

<thead>

<tr>
<th>No</th>
<th>Peminjam</th>
<th>Alat</th>
<th>Keterlambatan</th>
<th>Denda</th>
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

<td>{{ $item->keterlambatan }} Hari</td>

<td>
Rp {{ number_format($item->denda) }}
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