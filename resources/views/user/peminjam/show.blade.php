@extends('layouts.appuser')

@section('title', 'Detail Peminjam')

@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <h1>Detail Peminjam</h1>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-header bg-primary text-white">
                    Detail Data Peminjam
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="200">Nama</th>
                            <td>{{ $data->nama }}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{ $data->email }}</td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td>{{ $data->role }}</td>
                        </tr>

                        <tr>
                            <th>Terdaftar</th>
                            <td>{{ $data->created_at }}</td>
                        </tr>

                    </table>

                    <a href="/master/peminjam" class="btn btn-secondary">
                        Kembali
                    </a>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection