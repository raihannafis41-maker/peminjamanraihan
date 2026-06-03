@extends('layouts.appuser')

@section('title', 'Detail Peminjaman')

@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <h1>Detail Peminjaman</h1>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th>ID User</th>
                            <td>{{ $data->user_id }}</td>
                        </tr>

                        <tr>
                            <th>ID Alat</th>
                            <td>{{ $data->alat_id }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Pinjam</th>
                            <td>{{ $data->tanggal_pinjam }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Kembali</th>
                            <td>{{ $data->tanggal_kembali }}</td>
                        </tr>

                        <tr>
                            <th>Jumlah</th>
                            <td>{{ $data->jumlah }}</td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>{{ $data->status }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection