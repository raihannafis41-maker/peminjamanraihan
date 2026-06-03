@extends('layouts.appuser')

@section('title', 'Data Denda')

@section('content')

<section class="content-header">
    <div class="container-fluid">

```
    <div class="d-flex justify-content-between">

        <h1>Data Denda</h1>

        <a href="{{ route('denda.create') }}"
           class="btn btn-primary">

            Tambah Denda

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

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Peminjam</th>

                    <th>Alat</th>

                    <th>Keterlambatan</th>

                    <th>Total Denda</th>

                    <th>Status Bayar</th>

                    <th width="180">Aksi</th>

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

                        @if($item->status_bayar == 'sudah_bayar')

                            <span class="badge bg-success">
                                Sudah Bayar
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Belum Bayar
                            </span>

                        @endif

                    </td>

                    <td>

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

                @empty

                <tr>

                    <td colspan="7"
                        class="text-center">

                        Belum ada data denda.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
```

</section>

@endsection
