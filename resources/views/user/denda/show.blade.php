@extends('layouts.appuser')

@section('title', 'Detail Denda')

@section('content')

<section class="content-header">

```
<div class="container-fluid">

    <h1>Detail Denda</h1>

</div>
```

</section>

<section class="content">

```
<div class="card">

    <div class="card-body">

        <table class="table table-bordered">

            <tr>

                <th>Peminjam</th>

                <td>
                    {{ $data->pengembalian->peminjaman->user->nama ?? '-' }}
                </td>

            </tr>

            <tr>

                <th>Alat</th>

                <td>
                    {{ $data->pengembalian->peminjaman->alat->nama_alat ?? '-' }}
                </td>

            </tr>

            <tr>

                <th>Keterlambatan</th>

                <td>
                    {{ $data->pengembalian->keterlambatan }} Hari
                </td>

            </tr>

            <tr>

                <th>Total Denda</th>

                <td>
                    Rp {{ number_format($data->total_denda,0,',','.') }}
                </td>

            </tr>

            <tr>

                <th>Status Bayar</th>

                <td>
                    {{ ucfirst(str_replace('_',' ',$data->status_bayar)) }}
                </td>

            </tr>

        </table>

        <a href="{{ route('denda.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </div>

</div>
```

</section>

@endsection
