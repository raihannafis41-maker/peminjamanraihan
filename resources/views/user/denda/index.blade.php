@extends('layouts.appuser')

@section('title', 'Data Denda')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        ```
        <div class="d-flex justify-content-between align-items-center">

            <h1>Data Denda</h1>

            <a href="{{ route('denda.create') }}"
                class="btn btn-primary">

                <i class="fas fa-plus"></i> Tambah Denda

            </a>

        </div>

    </div>
    ```

</section>

<section class="content">

    ```
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

                            <th width="220">Aksi</th>

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
                                @if($item->metode_bayar)
                                {{ strtoupper($item->metode_bayar) }}
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

                                @else

                                <span class="badge bg-success">
                                    Sudah Bayar
                                </span>

                                @endif

                            </td>

                            <td>

                                @if($item->status_bayar == 'belum_bayar')

                                <button
                                    type="button"
                                    class="btn btn-success btn-sm"
                                    data-bs-toggle="modal"
                                    data-bs-target="#bayar{{ $item->id }}">

                                    Bayar

                                </button>

                                @endif

                                <a href="{{ route('denda.show',$item->id) }}"
                                    class="btn btn-info btn-sm">

                                    Detail

                                </a>

                                <a href="{{ route('denda.edit',$item->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('denda.destroy',$item->id) }}"
                                    method="POST"
                                    style="display:inline;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        <!-- MODAL BAYAR -->
                        <div class="modal fade"
                            id="bayar{{ $item->id }}"
                            tabindex="-1">

                            <div class="modal-dialog">

                                <div class="modal-content">

                                    <form action="{{ route('denda.bayar', $item->id) }}"
                                        method="POST">

                                        @csrf

                                        <div class="modal-header">

                                            <h5 class="modal-title">
                                                Pembayaran Denda
                                            </h5>

                                            <button type="button"
                                                class="btn-close"
                                                data-bs-dismiss="modal">
                                            </button>

                                        </div>

                                        <div class="modal-body">

                                            <div class="form-group">

                                                <label>
                                                    Total Denda
                                                </label>

                                                <input type="text"
                                                    class="form-control"
                                                    value="Rp {{ number_format($item->total_denda,0,',','.') }}"
                                                    readonly>

                                            </div>

                                            <div class="form-group mt-3">

                                                <label>
                                                    Metode Pembayaran
                                                </label>

                                                <select name="metode_bayar"
                                                    class="form-control"
                                                    required>

                                                    <option value="">
                                                        -- Pilih Metode --
                                                    </option>

                                                    <option value="cash">
                                                        Cash
                                                    </option>

                                                    <option value="non_cash">
                                                        Non Cash
                                                    </option>

                                                </select>

                                            </div>

                                        </div>

                                        <div class="modal-footer">

                                            <button type="submit"
                                                class="btn btn-success">

                                                Konfirmasi Pembayaran

                                            </button>

                                        </div>

                                    </form>

                                </div>

                            </div>

                        </div>

                        @empty

                        <tr>

                            <td colspan="9"
                                class="text-center">

                                Belum ada data denda.

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>
    ```

</section>

@endsection