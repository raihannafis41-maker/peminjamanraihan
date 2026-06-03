@extends('layouts.appuser')

@section('title', 'Data Alat')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">

            <h1 class="fw-bold">Data Alat</h1>

            <a href="{{ route('alat.create') }}" class="btn btn-primary">
                + Tambah Alat
            </a>

        </div>
    </div>
</section>

<section class="content">

<div class="card shadow-sm">

    <div class="card-header d-flex justify-content-between">

        <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">
            ← Kembali
        </a>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-striped align-middle">

            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Kategori</th>
                    <th>Nama Alat</th>
                    <th>Foto</th>
                    <th>Stok</th>
                    <th>Tersedia</th>
                    <th>Dipinjam</th>
                    <th>Lokasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>

                @forelse($data as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->kode_alat }}</td>

                    <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>

                    <td>
                        <strong>{{ $item->nama_alat }}</strong>
                        <br>
                        <small class="text-muted">
                            {{ \Str::limit($item->deskripsi, 40) }}
                        </small>
                    </td>

                    <td>
                        @if($item->foto)
                            <img src="{{ asset('storage/alat/'.$item->foto) }}"
                                 width="60" height="60"
                                 style="object-fit:cover;border-radius:6px;">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <td>{{ $item->stok }}</td>

                    <td><span class="badge bg-success">{{ $item->stok_tersedia }}</span></td>

                    <td><span class="badge bg-warning text-dark">{{ $item->stok_dipinjam }}</span></td>

                    <td>{{ $item->lokasi ?? '-' }}</td>

                    <td>
                        @if($item->status == 'tersedia')
                            <span class="badge bg-success">Tersedia</span>
                        @elseif($item->status == 'dipinjam')
                            <span class="badge bg-warning text-dark">Dipinjam</span>
                        @elseif($item->status == 'habis')
                            <span class="badge bg-danger">Habis</span>
                        @else
                            <span class="badge bg-secondary">Rusak</span>
                        @endif
                    </td>

                    <td class="d-flex gap-1">

                        <a href="{{ route('alat.show',$item->id) }}" class="btn btn-info btn-sm">
                            Detail
                        </a>

                        <a href="{{ route('alat.edit',$item->id) }}" class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <form action="{{ route('alat.destroy',$item->id) }}"
                              method="POST"
                              onsubmit="return confirm('Hapus alat ini?')">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                Hapus
                            </button>

                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="11" class="text-center text-muted">
                        Tidak ada data alat
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</section>

@endsection