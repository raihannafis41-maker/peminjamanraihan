{{-- resources/views/user/laporan/laporanpengembalian.blade.php --}}

@extends('layouts.appuser')

@section('title', 'Laporan Pengembalian')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <div class="d-flex gap-2 align-items-center">

            <a href="{{ route('laporan.index') }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>

            <h4 class="mb-0">Laporan Pengembalian</h4>

        </div>

        <a href="/laporan/cetakpengembalian"
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
                        <th>Tanggal Pengembalian</th>
                        <th>Keterlambatan</th>
                        <th>Denda</th>
                        <th>Kondisi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($data as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $item->peminjaman->user->nama ?? '-' }}
                            </td>

                            <td>
                                {{ $item->peminjaman->alat->nama_alat ?? '-' }}
                            </td>

                            <td>
                                {{ $item->tanggal_pengembalian }}
                            </td>

                            <td>
                                {{ $item->keterlambatan }} hari
                            </td>

                            <td>
                                Rp {{ number_format($item->denda, 0, ',', '.') }}
                            </td>

                            <td>

                                @if($item->kondisi_kembali == 'baik')
                                    <span class="badge bg-success">Baik</span>

                                @elseif($item->kondisi_kembali == 'rusak')
                                    <span class="badge bg-warning text-dark">Rusak</span>

                                @elseif($item->kondisi_kembali == 'hilang')
                                    <span class="badge bg-danger">Hilang</span>

                                @else
                                    <span class="badge bg-secondary">
                                        {{ $item->kondisi_kembali }}
                                    </span>
                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center">
                                Tidak ada data pengembalian
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection