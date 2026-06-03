@extends('layouts.appuser')

@section('title', 'Edit Denda')

@section('content')

<section class="content-header">

```
<div class="container-fluid">

    <h1>Edit Denda</h1>

</div>
```

</section>

<section class="content">

```
<div class="card">

    <div class="card-body">

        <form action="{{ route('denda.update',$data->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label>Pengembalian</label>

                <select name="pengembalian_id"
                        class="form-control">

                    @foreach($pengembalian as $item)

                    <option value="{{ $item->id }}"
                        {{ $item->id == $data->pengembalian_id ? 'selected' : '' }}>

                        {{ $item->peminjaman->kode_peminjaman ?? '-' }}

                    </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label>Total Denda</label>

                <input type="number"
                       name="total_denda"
                       value="{{ $data->total_denda }}"
                       class="form-control">

            </div>

            <div class="mb-3">

                <label>Status Bayar</label>

                <select name="status_bayar"
                        class="form-control">

                    <option value="belum_bayar"
                        {{ $data->status_bayar == 'belum_bayar' ? 'selected' : '' }}>
                        Belum Bayar
                    </option>

                    <option value="sudah_bayar"
                        {{ $data->status_bayar == 'sudah_bayar' ? 'selected' : '' }}>
                        Sudah Bayar
                    </option>

                </select>

            </div>

            <button class="btn btn-success">

                Update

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
