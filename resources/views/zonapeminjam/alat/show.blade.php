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

                <div class="row">

                    <div class="col-md-4 text-center mb-3">

                        @if($data->foto)

                            <img src="{{ asset('storage/alat/'.$data->foto) }}"
                                 alt="{{ $data->nama_alat }}"
                                 class="img-fluid img-thumbnail"
                                 style="max-height:300px; object-fit:cover;">

                        @else

                            <img src="https://via.placeholder.com/300x250?text=Foto+Alat"
                                 alt="Foto Tidak Tersedia"
                                 class="img-fluid img-thumbnail">

                        @endif

                    </div>

                    <div class="col-md-8">

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
                                    Stok Tersedia
                                </th>

                                <td>
                                    {{ $data->stok_tersedia }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Sedang Dipinjam
                                </th>

                                <td>
                                    {{ $data->stok_dipinjam }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Lokasi
                                </th>

                                <td>
                                    {{ $data->lokasi ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Kondisi
                                </th>

                                <td>
                                    {{ $data->kondisi->nama_kondisi ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Deskripsi
                                </th>

                                <td>
                                    {{ $data->deskripsi ?? '-' }}
                                </td>
                            </tr>

                            <tr>
                                <th>
                                    Status
                                </th>

                                <td>

                                    @if($data->status == 'tersedia')

                                        <span class="badge bg-success">
                                            Tersedia
                                        </span>

                                    @elseif($data->status == 'dipinjam')

                                        <span class="badge bg-warning text-dark">
                                            Dipinjam
                                        </span>

                                    @elseif($data->status == 'habis')

                                        <span class="badge bg-danger">
                                            Habis
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ ucfirst($data->status) }}
                                        </span>

                                    @endif

                                </td>
                            </tr>

                        </table>

                    </div>

                </div>

                <div class="mt-3">

                    <a href="{{ route('zonapeminjam.alat') }}"
                       class="btn btn-secondary">

                        <i class="fas fa-arrow-left"></i>
                        Kembali

                    </a>

                    @if($data->status == 'tersedia' && $data->stok_tersedia > 0)

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