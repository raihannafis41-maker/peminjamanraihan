@extends('layouts.appuser')

@section('title', 'Detail User')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Detail User</h1>
        </div>
    </section>

    <section class="content">

        <div class="card">

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="200">Nama</th>
                        <td>{{ $data->nama }}</td>
                    </tr>

                    <tr>
                        <th>Username</th>
                        <td>{{ $data->username }}</td>
                    </tr>

                    <tr>
                        <th>Role</th>
                        <td>{{ $data->role }}</td>
                    </tr>

                </table>

            </div>

        </div>

    </section>

</div>

@endsection