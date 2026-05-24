@extends('layouts.apppeminjam')

@section('content')

<div class="container py-4">

    <div class="card shadow border-0">

        <div class="card-header bg-dark text-white">

            <h4 class="mb-0">

                Detail Riwayat Peminjaman

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

                        @if($data->status == 'pending')

                            <span class="badge bg-warning">

                                Pending

                            </span>

                        @elseif($data->status == 'approved')

                            <span class="badge bg-primary">

                                Approved

                            </span>

                        @elseif($data->status == 'selesai')

                            <span class="badge bg-success">

                                Selesai

                            </span>

                        @elseif($data->status == 'ditolak')

                            <span class="badge bg-danger">

                                Ditolak

                            </span>

                        @else

                            <span class="badge bg-secondary">

                                {{ $data->status }}

                            </span>

                        @endif

                    </td>

                </tr>

                <tr>

                    <th>
                        Keterangan
                    </th>

                    <td>
                        {{ $data->keterangan ?? '-' }}
                    </td>

                </tr>

            </table>

            <a href="{{ route('zonapeminjam.riwayat') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection