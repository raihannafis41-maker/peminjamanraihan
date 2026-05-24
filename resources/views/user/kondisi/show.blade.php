@extends('layouts.appuser')

@section('title', 'Detail Kondisi')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Detail Kondisi</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<table class="table table-bordered">

<tr>
<th width="200">Nama Kondisi</th>
<td>{{ $data->nama_kondisi }}</td>
</tr>

<tr>
<th>Keterangan</th>
<td>{{ $data->keterangan }}</td>
</tr>

</table>

</div>

</div>

</section>

</div>

@endsection