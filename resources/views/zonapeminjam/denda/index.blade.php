@extends('layouts.apppeminjam')

@section('title', 'Pembayaran Denda')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <h1>Pembayaran Denda</h1>

    </div>

</section>

<section class="content">

    <div class="card">

        <div class="card-body">

            <table class="table table-bordered table-striped">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Nama Alat</th>
                        <th>Keterlambatan</th>
                        <th>Total Denda</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($data as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>
                            {{ $item->pengembalian->peminjaman->alat->nama_alat ?? '-' }}
                        </td>

                        <td>
                            {{ $item->pengembalian->keterlambatan ?? 0 }}
                            Hari
                        </td>

                        <td>
                            Rp {{ number_format($item->total_denda,0,',','.') }}
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

                                Lunas

                            </span>

                            @endif

                        </td>

                        <td>

                            @if($item->status_bayar == 'belum_bayar')

                            <a href="{{ route('zonapeminjam.denda.bayar',$item->id) }}"
                                class="btn btn-success btn-sm">

                                Bayar Sekarang

                            </a>

                            @else

                            <span class="text-success">

                                Lunas

                            </span>

                            @endif

                        </td>

                    </tr>

                    {{-- MODAL PEMBAYARAN --}}

                    <div class="modal fade"
                        id="bayar{{ $item->id }}"
                        tabindex="-1">

                        <div class="modal-dialog">

                            <div class="modal-content">

                                <form
                                    action="{{ route('denda.bayar',$item->id) }}"
                                    method="POST">

                                    @csrf

                                    <div class="modal-header">

                                        <h5 class="modal-title">

                                            Pembayaran Denda

                                        </h5>

                                    </div>

                                    <div class="modal-body">

                                        <label>
                                            Metode Pembayaran
                                        </label>

                                        <select
                                            name="metode_bayar"
                                            class="form-control"
                                            required>

                                            <option value="cash">
                                                Cash
                                            </option>

                                            <option value="transfer">
                                                Transfer
                                            </option>

                                            <option value="qris">
                                                QRIS
                                            </option>

                                        </select>

                                    </div>

                                    <div class="modal-footer">

                                        <button
                                            type="submit"
                                            class="btn btn-success">

                                            Bayar

                                        </button>

                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="text-center">

                            Tidak ada denda.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</section>

@endsection