@extends('layouts.appuser')

@section('title', 'Log Activity')

@section('content')

<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<h1>Log Activity</h1>
</div>
</section>

<section class="content">

<div class="card">

<div class="card-body">

<table class="table table-bordered table-striped">

<thead>

<tr>
<th>No</th>
<th>User</th>
<th>Aktivitas</th>
<th>Waktu</th>
</tr>

</thead>

<tbody>

@foreach($data as $item)

<tr>

<td>{{ $loop->iteration }}</td>

<td>
{{ $item->user->nama ?? '-' }}
</td>

<td>
{{ $item->aktivitas }}
</td>

<td>
{{ $item->created_at }}
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