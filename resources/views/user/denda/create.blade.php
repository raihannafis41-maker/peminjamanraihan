@extends('layouts.appuser')

@section('title', 'Tambah Denda')

@section('content')

<section class="content-header">

```
<div class="container-fluid">

    <h1>Tambah Data Denda</h1>

</div>
```

</section>

<section class="content">

```
<div class="card">

    <div class="card-body">

        <form action="{{ route('denda.store') }}"
              method="POST">

            @csrf

            <div class="mb-3">

                <label>Data Pengembalian</label>

                <select name="pengembalian_id"
                        class="form-control"
                        required>

                    <option value="">
                        -- Pilih --
                    </option>

                    @foreach($pengembalian as $item)

                    <option value="{{ $item->id }}">

                        {{ $item->peminjaman->kode_peminjaman ?? '-' }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Total Denda</label>

                <input type="number"
                       name="total_denda"
                       class="form-control"
                       required>

            </div>

            <div class="mb-3">

                <label>Status Bayar</label>

                <select name="status_bayar"
                        class="form-control">

                    <option value="belum_bayar">
                        Belum Bayar
                    </option>

                    <option value="sudah_bayar">
                        Sudah Bayar
                    </option>

                </select>

            </div>

            <button class="btn btn-success">

                Simpan

            </button>

            <a href="{{ route('denda.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </form>

    </div>

</div>
```

</section>

@endsection
