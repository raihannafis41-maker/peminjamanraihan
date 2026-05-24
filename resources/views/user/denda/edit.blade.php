@extends('layouts.appuser')

@section('title', 'Edit Denda')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Edit Denda</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<form action="{{ route('denda.update', $data->id) }}"
method="POST">

@csrf
@method('PUT')

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

<button class="btn btn-warning">
Update
</button>

</form>

</div>

</div>

</section>

</div>

@endsection