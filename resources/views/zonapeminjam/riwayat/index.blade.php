@extends('layouts.apppeminjam')

@section('content')

<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h3 class="fw-bold">
            Riwayat Peminjaman
        </h3>

        <a href="{{ route('zonapeminjam.alat') }}"
           class="btn btn-primary">

            <i class="fas fa-plus"></i>
            Pinjam Alat

        </a>

    </div>

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

    <div class="card shadow-sm border-0">

        <div class="card-header bg-dark text-white">

            <h5 class="mb-0">
                Data Riwayat Peminjaman
            </h5>

        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="5%">No</th>

                            <th>Foto</th>

                            <th>Kode Peminjaman</th>

                            <th>Nama Alat</th>

                            <th>Tanggal Pinjam</th>

                            <th>Tanggal Kembali</th>

                            <th>Jumlah</th>

                            <th>Status</th>

                            <th width="25%">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td class="text-center">

                                    @if($item->alat && $item->alat->foto)

                                        <img src="{{ asset('storage/alat/'.$item->alat->foto) }}"
                                             width="80"
                                             height="80"
                                             style="object-fit:cover;border-radius:8px;">

                                    @else

                                        <span class="text-muted">
                                            No Image
                                        </span>

                                    @endif

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

                                    @switch($item->status)

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
                                                {{ ucfirst($item->status) }}
                                            </span>

                                    @endswitch

                                </td>

                                <td>

                                    <a href="{{ route('zonapeminjam.riwayat.show', $item->id) }}"
                                       class="btn btn-info btn-sm">

                                        <i class="fas fa-eye"></i>
                                        Detail

                                    </a>

                                    @if(
                                        $item->status == 'approved' ||
                                        $item->status == 'dipinjam'
                                    )

                                        <form action="{{ route('zonapeminjam.kembalikan', $item->id) }}"
                                              method="POST"
                                              class="d-inline">

                                            @csrf

                                            <button type="submit"
                                                    class="btn btn-success btn-sm"
                                                    onclick="return confirm('Yakin ingin mengembalikan barang ini?')">

                                                <i class="fas fa-undo"></i>
                                                Kembalikan

                                            </button>

                                        </form>

                                    @endif

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9" class="text-center">
                                    Belum ada riwayat peminjaman.
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