@extends('layouts.apppeminjam')

@section('title', 'Detail Peminjaman')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <h1 class="fw-bold">
            Detail Peminjaman
        </h1>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <div class="card shadow border-0">

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="250">Nama Alat</th>
                        <td>{{ $data->alat->nama_alat ?? '-' }}</td>
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

                <a href="{{ route('peminjaman.index') }}"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</section>

@endsection