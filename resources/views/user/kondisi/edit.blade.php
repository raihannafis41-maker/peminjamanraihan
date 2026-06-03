@extends('layouts.appuser')

@section('title', 'Edit Kondisi')

@section('content')


<section class="content-header">
<div class="container-fluid">
<h1>Edit Kondisi</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<form action="{{ route('kondisi.update', $data->id) }}"
method="POST">

@csrf
@method('PUT')

<div class="form-group">
<label>Nama Kondisi</label>

<input type="text"
name="nama_kondisi"
value="{{ $data->nama_kondisi }}"
class="form-control">
</div>

<div class="form-group">
<label>Keterangan</label>

<textarea name="keterangan"
class="form-control"
rows="5">{{ $data->keterangan }}</textarea>
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