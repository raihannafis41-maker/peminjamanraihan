@extends('layouts.apppeminjam')

@section('title', 'Surat Teguran')

@section('content')



```
<section class="content-header">

    <div class="container-fluid">

        <div class="row mb-2">

            <div class="col-sm-6">

                <h1>Surat Teguran</h1>

            </div>

        </div>

    </div>

</section>

<section class="content">

    <div class="container-fluid">

        @forelse($data as $item)

            <div class="card card-danger">

                <div class="card-header">

                    <h3 class="card-title">

                        Surat Teguran Pembayaran Denda

                    </h3>

                </div>

                <div class="card-body">

                    <p>
                        Kepada peminjam yang terhormat,
                    </p>

                    <p>

                        Berdasarkan data pengembalian alat, Anda masih memiliki
                        kewajiban pembayaran denda atas peminjaman alat:

                    </p>

                    <table class="table table-bordered">

                        <tr>

                            <th width="250">
                                Nama Alat
                            </th>

                            <td>
                                {{ $item->pengembalian->peminjaman->alat->nama_alat ?? '-' }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Total Denda
                            </th>

                            <td>
                                Rp {{ number_format($item->total_denda,0,',','.') }}
                            </td>

                        </tr>

                        <tr>

                            <th>
                                Status Pembayaran
                            </th>

                            <td>

                                <span class="badge badge-danger">

                                    Belum Bayar

                                </span>

                            </td>

                        </tr>

                    </table>

                    <div class="alert alert-warning mt-3">

                        <strong>Perhatian!</strong>

                        Segera lakukan pembayaran denda agar tidak
                        mendapatkan sanksi administratif lebih lanjut.

                    </div>

                </div>

            </div>

        @empty

            <div class="card">

                <div class="card-body text-center">

                    <i class="fas fa-check-circle fa-4x text-success mb-3"></i>

                    <h4>

                        Tidak Ada Surat Teguran

                    </h4>

                    <p>

                        Seluruh denda Anda sudah dibayar atau
                        tidak memiliki tunggakan denda.

                    </p>

                </div>

            </div>

        @endforelse

    </div>

</section>
```

</div>

@endsection
