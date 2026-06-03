@extends('layouts.appuser')

@section('title', 'Detail Kategori')

@section('content')


<section class="content-header">
<div class="container-fluid">
<h1>Detail Kategori</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<table class="table table-bordered">

<tr>
<th width="200">Nama Kategori</th>
<td>{{ $data->nama_kategori }}</td>
</tr>

<tr>
<th>Deskripsi</th>
<td>{{ $data->deskripsi }}</td>
</tr>

</table>

</div>

</div>

</section>

</div>

@endsection