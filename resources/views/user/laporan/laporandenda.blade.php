{{-- resources/views/user/laporan/laporandenda.blade.php --}}

@extends('layouts.appuser')

@section('title', 'Laporan Denda')

@section('content')

<div class="card">

    <div class="card-header d-flex justify-content-between">

        <h4>Laporan Denda</h4>

        <a href="/laporan/cetakdenda"
           target="_blank"
           class="btn btn-danger">

            Cetak Laporan

        </a>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead>

                <tr>
                    <th>No</th>
                    <th>Nama Denda</th>
                    <th>Nominal</th>
                    <th>Keterangan</th>
                </tr>

            </thead>

            <tbody>

                @foreach($data as $item)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->nama_denda }}</td>

                    <td>
                        Rp {{ number_format($item->nominal) }}
                    </td>

                    <td>{{ $item->keterangan }}</td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection