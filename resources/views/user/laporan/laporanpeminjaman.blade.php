{{-- resources/views/user/laporan/laporanpeminjaman.blade.php --}}

@extends('layouts.appuser')

@section('title', 'Laporan Peminjaman')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <div class="d-flex gap-2 align-items-center">

            <a href="{{ route('laporan.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>

            <h4 class="mb-0">Laporan Peminjaman</h4>

        </div>

        <a href="/laporan/cetakpeminjaman"
           target="_blank"
           class="btn btn-primary btn-sm">

            Cetak Laporan
        </a>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Alat</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($data as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->nama ?? '-' }}</td>
                            <td>{{ $item->alat->nama_alat ?? '-' }}</td>
                            <td>{{ $item->tanggal_pinjam }}</td>
                            <td>{{ $item->tanggal_kembali ?? '-' }}</td>
                            <td>
                                @if($item->status == 'dipinjam')
                                    <span class="badge bg-warning">Dipinjam</span>
                                @elseif($item->status == 'dikembalikan')
                                    <span class="badge bg-success">Dikembalikan</span>
                                @else
                                    <span class="badge bg-secondary">
                                        {{ $item->status }}
                                    </span>
                                @endif
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center">
                                Tidak ada data peminjaman
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection