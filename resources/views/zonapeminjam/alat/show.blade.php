@extends('layouts.apppeminjam')

@section('title', 'Detail Alat')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <h1 class="fw-bold">
            Detail Alat
        </h1>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <div class="card shadow-sm border-0">

            <div class="card-header bg-primary">

                <h3 class="card-title">
                    Informasi Alat
                </h3>

            </div>

            <div class="card-body">

                <table class="table table-bordered">

                    <tr>
                        <th width="250">
                            Nama Alat
                        </th>

                        <td>
                            {{ $data->nama_alat }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Kategori
                        </th>

                        <td>
                            {{ $data->kategori->nama_kategori ?? '-' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Stok
                        </th>

                        <td>
                            {{ $data->stok }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Kondisi
                        </th>

                        <td>
                            {{ $data->kondisi }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Status
                        </th>

                        <td>

                            @if($data->status == 'tersedia')

                                <span class="badge bg-success">
                                    {{ $data->status }}
                                </span>

                            @else

                                <span class="badge bg-danger">
                                    {{ $data->status }}
                                </span>

                            @endif

                        </td>
                    </tr>

                    <tr>
                        <th>
                            Foto
                        </th>

                        <td>

                            @if($data->foto)

                                <img src="{{ asset('uploads/alat/' . $data->foto) }}"
                                     width="200"
                                     class="img-thumbnail">

                            @else

                                <span class="text-muted">
                                    Foto tidak tersedia
                                </span>

                            @endif

                        </td>
                    </tr>

                </table>

                <div class="mt-3">

                    <a href="{{ route('zonapeminjam.alat') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-arrow-left"></i>
                        Kembali

                    </a>

                    @if($data->status == 'tersedia')

                        <a href="{{ route('zonapeminjam.pinjam', $data->id) }}"
                           class="btn btn-primary">

                            <i class="fas fa-handshake"></i>
                            Ajukan Pinjam

                        </a>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>

@endsection