@extends('layouts.appuser')

@section('title', 'Data Denda')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <h1>Data Denda</h1>

            <a href="{{ route('denda.create') }}"
                class="btn btn-primary">

                <i class="fas fa-plus"></i>
                Tambah Denda

            </a>

        </div>

    </div>
</section>

<section class="content">

    <div class="card">

        <div class="card-body">

            @if(session('success'))

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-striped">

                    <thead class="table-dark">

                        <tr>

                            <th>No</th>
                            <th>Peminjam</th>
                            <th>Alat</th>
                            <th>Keterlambatan</th>
                            <th>Total Denda</th>
                            <th>Metode</th>
                            <th>Tanggal Bayar</th>
                            <th>Status Bayar</th>
                            <th width="260">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                        <tr>

                            <td>{{ $loop->iteration }}</td>

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
                                Rp {{ number_format($item->total_denda,0,',','.') }}
                            </td>

                            <td>

                                @if($item->metode_pembayaran)

                                {{ strtoupper($item->metode_pembayaran) }}

                                @else

                                -

                                @endif

                            </td>

                            <td>

                                @if($item->tanggal_bayar)

                                {{ date('d-m-Y H:i', strtotime($item->tanggal_bayar)) }}

                                @else

                                -

                                @endif

                            </td>

                            <td>

                                @if($item->status_bayar == 'belum_bayar')

                                <span class="badge bg-danger">
                                    Belum Bayar
                                </span>

                                @elseif($item->status_bayar == 'menunggu_verifikasi')

                                <span class="badge bg-warning">
                                    Menunggu Verifikasi
                                </span>

                                @elseif($item->status_bayar == 'sudah_bayar')

                                <span class="badge bg-success">
                                    Sudah Bayar
                                </span>

                                @endif

                            </td>

                            <td>

                                @if($item->status_bayar == 'menunggu_verifikasi')

                                <form
                                    action="{{ route('denda.verifikasi',$item->id) }}"
                                    method="POST"
                                    style="display:inline;">

                                    @csrf

                                    <button
                                        type="submit"
                                        class="btn btn-success btn-sm">

                                        <i class="fas fa-check"></i>
                                        Verifikasi

                                    </button>

                                </form>

                                @endif

                                <a href="{{ route('denda.show',$item->id) }}"
                                    class="btn btn-info btn-sm">

                                    Detail

                                </a>

                                <a href="{{ route('denda.edit',$item->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form
                                    action="{{ route('denda.destroy',$item->id) }}"
                                    method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="9" class="text-center">

                                Belum ada data denda.

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