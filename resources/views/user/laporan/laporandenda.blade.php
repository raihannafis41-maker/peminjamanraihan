@extends('layouts.appuser')

@section('title', 'Laporan Denda')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center">

        <div class="d-flex gap-2 align-items-center">
            <a href="{{ url()->previous() }}" class="btn btn-secondary btn-sm">
                ← Kembali
            </a>

            
        </div>

        <h4 class="mb-0">
            Laporan Denda
        </h4>

        <a href="{{ route('laporan.cetakdenda') }}"
            target="_blank"
            class="btn btn-danger">

            <i class="fas fa-print"></i>
            Cetak Laporan

        </a>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-bordered table-striped">

                <thead class="table-dark">

                    <tr>

                        <th width="5%">
                            No
                        </th>

                        <th>
                            Nama Peminjam
                        </th>

                        <th>
                            Nama Alat
                        </th>

                        <th>
                            Keterlambatan
                        </th>

                        <th>
                            Total Denda
                        </th>

                        <th>
                            Status Bayar
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $item)

                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td>
                            {{ $item->pengembalian->peminjaman->user->nama ?? '-' }}
                        </td>

                        <td>
                            {{ $item->pengembalian->peminjaman->alat->nama_alat ?? '-' }}
                        </td>

                        <td>
                            {{ $item->pengembalian->keterlambatan ?? 0 }} Hari
                        </td>

                        <td>
                            Rp {{ number_format($item->total_denda, 0, ',', '.') }}
                        </td>

                        <td>

                            @if($item->status_bayar == 'sudah_bayar')

                            <span class="badge bg-success">
                                Sudah Bayar
                            </span>

                            @else

                            <span class="badge bg-danger">
                                Belum Bayar
                            </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            Tidak ada data denda.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection