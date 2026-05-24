@extends('layouts.appuser')

@section('title', 'Data Peminjaman')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h1>Data Peminjaman</h1>

                <a href="{{ route('peminjaman.create') }}"
                   class="btn btn-primary">

                    <i class="fas fa-plus"></i>
                    Tambah Peminjaman

                </a>

            </div>

        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card shadow">

                <div class="card-body table-responsive">

                    <table class="table table-bordered table-striped">

                        <thead class="bg-dark">

                            <tr>
                                <th>No</th>
                                <th>ID User</th>
                                <th>ID Alat</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th width="220">Aksi</th>
                            </tr>

                        </thead>

                        <tbody>

                            @forelse($data as $item)

                            <tr>

                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user_id }}</td>
                                <td>{{ $item->alat_id }}</td>
                                <td>{{ $item->tanggal_pinjam }}</td>
                                <td>{{ $item->tanggal_kembali }}</td>
                                <td>{{ $item->jumlah }}</td>

                                <td>

                                    @if($item->status == 'pending')

                                        <span class="badge badge-warning">
                                            Pending
                                        </span>

                                    @elseif($item->status == 'approved')

                                        <span class="badge badge-success">
                                            Approved
                                        </span>

                                    @else

                                        <span class="badge badge-secondary">
                                            {{ $item->status }}
                                        </span>

                                    @endif

                                </td>

                                <td>

                                    <a href="{{ route('peminjaman.show', $item->id) }}"
                                       class="btn btn-info btn-sm">

                                        Detail

                                    </a>

                                    <a href="{{ route('peminjaman.edit', $item->id) }}"
                                       class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <a href="/transaksi/approval/{{ $item->id }}"
                                       class="btn btn-success btn-sm">

                                        Approval

                                    </a>

                                    <form action="{{ route('peminjaman.destroy', $item->id) }}"
                                          method="POST"
                                          style="display:inline-block;">

                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm"
                                                onclick="return confirm('Yakin hapus data?')">

                                            Hapus

                                        </button>

                                    </form>

                                </td>

                            </tr>

                            @empty

                            <tr>

                                <td colspan="8" class="text-center">

                                    Data peminjaman belum tersedia

                                </td>

                            </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection