@extends('layouts.apppeminjam')

@section('content')

<div class="container py-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Status Peminjaman
        </h3>

        <a href="{{ route('zonapeminjam.alat') }}"
           class="btn btn-primary">

            Pinjam Alat

        </a>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    @if(session('error'))

        <div class="alert alert-danger">

            {{ session('error') }}

        </div>

    @endif

    {{-- TABEL --}}
    <div class="card shadow-sm border-0">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="5%">No</th>

                            <th>Kode Peminjaman</th>

                            <th>Nama Alat</th>

                            <th>Tanggal Pinjam</th>

                            <th>Tanggal Kembali</th>

                            <th>Jumlah</th>

                            <th>Status</th>

                            <th width="15%">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>
                                    {{ $item->kode_peminjaman }}
                                </td>

                                <td>
                                    {{ $item->alat->nama_alat ?? '-' }}
                                </td>

                                <td>
                                    {{ $item->tanggal_pinjam }}
                                </td>

                                <td>
                                    {{ $item->tanggal_kembali }}
                                </td>

                                <td>
                                    {{ $item->jumlah }}
                                </td>

                                <td>

                                    @if($item->status == 'pending')

                                        <span class="badge bg-warning">
                                            Pending
                                        </span>

                                    @elseif($item->status == 'approved')

                                        <span class="badge bg-success">
                                            Disetujui
                                        </span>

                                    @elseif($item->status == 'dipinjam')

                                        <span class="badge bg-primary">
                                            Dipinjam
                                        </span>

                                    @elseif($item->status == 'dikembalikan')

                                        <span class="badge bg-info">
                                            Dikembalikan
                                        </span>

                                    @elseif($item->status == 'rejected')

                                        <span class="badge bg-danger">
                                            Ditolak
                                        </span>

                                    @else

                                        <span class="badge bg-secondary">
                                            {{ ucfirst($item->status) }}
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('zonapeminjam.riwayat.show', $item->id) }}"
                                       class="btn btn-info btn-sm">

                                        Detail

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="8"
                                    class="text-center">

                                    Belum ada data peminjaman.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection