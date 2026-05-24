@extends('layouts.apppeminjam')

@section('title', 'Kategori Alat')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <h1>
            Kategori Alat
        </h1>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        <div class="card shadow-sm">

            <div class="card-header bg-primary">

                <h3 class="card-title">
                    Data Kategori
                </h3>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover">

                    <thead class="thead-light">

                        <tr>
                            <th width="80">No</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th width="150">Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->nama_kategori }}
                            </td>

                            <td>
                                {{ $item->deskripsi }}
                            </td>

                            <td>

                                <a href="/peminjam/kategori/{{ $item->id }}"
                                   class="btn btn-info btn-sm">

                                    Detail

                                </a>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="4" class="text-center">

                                Data kategori belum tersedia

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection