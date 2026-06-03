@extends('layouts.apppeminjam')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3 class="fw-bold mb-0">
            Detail Riwayat Peminjaman
        </h3>

        <a href="{{ route('zonapeminjam.riwayat') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>
            Kembali

        </a>

    </div>

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">

            <h4 class="mb-0">

                Informasi Peminjaman

            </h4>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>

                    <th width="30%">
                        Nama Alat
                    </th>

                    <td>
                        {{ $data->alat->nama_alat ?? '-' }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Kode Peminjaman
                    </th>

                    <td>
                        {{ $data->kode_peminjaman ?? '-' }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Tanggal Pinjam
                    </th>

                    <td>
                        {{ $data->tanggal_pinjam }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Tanggal Kembali
                    </th>

                    <td>
                        {{ $data->tanggal_kembali }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Jumlah
                    </th>

                    <td>
                        {{ $data->jumlah }}
                    </td>

                </tr>

                <tr>

                    <th>
                        Status
                    </th>

                    <td>

                        @switch($data->status)

                            @case('pending')
                                <span class="badge bg-warning">
                                    Pending
                                </span>
                            @break

                            @case('approved')
                                <span class="badge bg-success">
                                    Disetujui
                                </span>
                            @break

                            @case('dipinjam')
                                <span class="badge bg-primary">
                                    Sedang Dipinjam
                                </span>
                            @break

                            @case('dikembalikan')
                                <span class="badge bg-info">
                                    Dikembalikan
                                </span>
                            @break

                            @case('rejected')
                                <span class="badge bg-danger">
                                    Ditolak
                                </span>
                            @break

                            @default
                                <span class="badge bg-secondary">
                                    {{ ucfirst($data->status) }}
                                </span>

                        @endswitch

                    </td>

                </tr>

                <tr>

                    <th>
                        Catatan
                    </th>

                    <td>
                        {{ $data->catatan ?? '-' }}
                    </td>

                </tr>

            </table>

            <div class="mt-3">

                <a href="{{ route('zonapeminjam.riwayat') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Riwayat

                </a>

            </div>

        </div>

    </div>

</div>

@endsection