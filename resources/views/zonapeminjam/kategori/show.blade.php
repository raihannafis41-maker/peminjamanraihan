@extends('layouts.apppeminjam')

@section('title', 'Detail Kategori')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <h1>
            Detail Kategori
        </h1>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <div class="card shadow-sm">

            <div class="card-header bg-primary">

                <h3 class="card-title">
                    Informasi Kategori
                </h3>

            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="250">Nama Kategori</th>
                        <td>{{ $data->nama_kategori }}</td>
                    </tr>

                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $data->deskripsi }}</td>
                    </tr>

                </table>

                <a href="/peminjam/kategori"
                   class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </div>

    </div>

</section>

@endsection