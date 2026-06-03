@extends('layouts.appuser')

@section('title', 'Data Kondisi')

@section('content')


    <section class="content-header">
        <div class="container-fluid">
            <h1>Data Kondisi</h1>
        </div>
    </section>

    <section class="content">

        <div class="card">

            <div class="card-header">
                <a href="{{ route('kondisi.create') }}" class="btn btn-primary">
                    Tambah Kondisi
                </a>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kondisi</th>
                            <th>Keterangan</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($data as $item)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_kondisi }}</td>
                            <td>{{ $item->keterangan }}</td>

                            <td>

                                <a href="{{ route('kondisi.show', $item->id) }}"
                                    class="btn btn-info btn-sm">
                                    Detail
                                </a>

                                <a href="{{ route('kondisi.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('kondisi.destroy', $item->id) }}"
                                    method="POST"
                                    style="display:inline-block;">

                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus data?')">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </section>

</div>

@endsection