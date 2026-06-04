@extends('layouts.apppeminjam')

@section('title', 'Pembayaran Denda')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <h1>Pembayaran Denda</h1>

    </div>

</section>

<section class="content">

    <div class="card card-primary">

        <div class="card-header">

            <h3 class="card-title">

                Detail Denda

            </h3>

        </div>

        <div class="card-body">

            <table class="table table-bordered">

                <tr>
                    <th width="250">Nama Alat</th>
                    <td>
                        {{ $denda->pengembalian->peminjaman->alat->nama_alat ?? '-' }}
                    </td>
                </tr>

                <tr>
                    <th>Keterlambatan</th>
                    <td>
                        {{ $denda->pengembalian->keterlambatan ?? 0 }} Hari
                    </td>
                </tr>

                <tr>
                    <th>Total Denda</th>
                    <td>
                        <strong class="text-danger">
                            Rp {{ number_format($denda->total_denda,0,',','.') }}
                        </strong>
                    </td>
                </tr>

            </table>

            <hr>

            <form method="GET">

                <div class="form-group">

                    <label>
                        Pilih Metode Pembayaran
                    </label>

                    <select
                        id="metode"
                        class="form-control">

                        <option value="">
                            -- Pilih Metode --
                        </option>

                        <option value="cash">
                            Cash
                        </option>

                        <option value="transfer">
                            Transfer Bank
                        </option>

                        <option value="qris">
                            QRIS
                        </option>

                    </select>

                </div>

                <div class="mt-3">

                    <button
                        type="button"
                        onclick="lanjutBayar()"
                        class="btn btn-success">

                        Lanjut Pembayaran

                    </button>

                    <a href="{{ route('zonapeminjam.denda') }}"
                       class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </form>

        </div>

    </div>

</section>

<script>

function lanjutBayar()
{
    let metode = document.getElementById('metode').value;

    if(metode === '')
    {
        alert('Pilih metode pembayaran terlebih dahulu');
        return;
    }

    if(metode === 'qris')
    {
        window.location.href =
        "{{ route('zonapeminjam.qris',$denda->id) }}";
    }
    else
    {
        alert(
            'Silakan lakukan pembayaran melalui petugas untuk metode ' +
            metode.toUpperCase()
        );
    }
}

</script>

@endsection