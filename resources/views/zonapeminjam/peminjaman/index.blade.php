@extends('layouts.apppeminjam')

@section('title', 'Status & Riwayat Peminjaman')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <h1 class="fw-bold">
                Status & Riwayat Peminjaman
            </h1>

            <a href="/zonapeminjam/alat"
               class="btn btn-primary">

                <i class="fas fa-tools"></i>
                Lihat Alat

            </a>

        </div>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        @if(session('success'))

            <div class="alert alert-success">

                {{ session('success') }}

            </div>

        @endif

        <div class="card shadow border-0">

            <div class="card-header bg-primary">

                <h3 class="card-title text-white">

                    Data Peminjaman Saya

                </h3>

            </div>

            <div class="card-body table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th width="60">No</th>
                            <th>Nama Alat</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th width="100">Jumlah</th>
                            <th width="150">Status</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                            <tr>

                                <td>

                                    {{ $loop->iteration }}

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

                                    @elseif($item->status == 'disetujui')

                                        <span class="badge bg-success">

                                            Disetujui

                                        </span>

                                    @elseif($item->status == 'ditolak')

                                        <span class="badge bg-danger">

                                            Ditolak

                                        </span>

                                    @elseif($item->status == 'dikembalikan')

                                        <span class="badge bg-info">

                                            Dikembalikan

                                        </span>

                                    @else

                                        <span class="badge bg-secondary">

                                            {{ $item->status }}

                                        </span>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="6"
                                    class="text-center">

                                    Belum ada data peminjaman

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