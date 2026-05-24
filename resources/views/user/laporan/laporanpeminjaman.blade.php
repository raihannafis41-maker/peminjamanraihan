{{-- resources/views/user/laporan/laporanpeminjaman.blade.php --}}

@extends('layouts.appuser')

@section('title', 'Laporan Peminjaman')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h4>Laporan Peminjaman</h4>

        <a href="/laporan/cetakpeminjaman"
           target="_blank"
           class="btn btn-primary">

            Cetak Laporan

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>
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

                @foreach($data as $item)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->user->nama ?? '-' }}</td>
                    <td>{{ $item->alat->nama_alat ?? '-' }}</td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>{{ $item->status }}</td>
                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection