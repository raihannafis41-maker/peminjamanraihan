@extends('layouts.appuser')

@section('title', 'Data Peminjam')

@section('content')


<!-- HEADER -->
<section class="content-header">

    <div class="container-fluid">

        <h1 class="fw-bold">
            Data Peminjam
        </h1>

    </div>

</section>

<!-- CONTENT -->
<section class="content">

    <div class="container-fluid">

        <div class="card shadow-sm">

            <div class="card-header">

                <h3 class="card-title">
                    Daftar Peminjam
                </h3>

            </div>

            <div class="card-body">

                <table class="table table-bordered table-striped">

                    <thead>

                        <tr>

                            <th width="60">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th width="200">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $item->nama }}
                            </td>

                            <td>
                                {{ $item->email }}
                            </td>

                            <td>

                                <span class="badge bg-success">

                                    {{ $item->role }}

                                </span>

                            </td>

                            <td>

                                <a href="{{ route('peminjam.show', $item->id) }}"
                                    class="btn btn-info btn-sm">

                                    Detail

                                </a>

                                <a href="{{ route('peminjam.edit', $item->id) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route('peminjam.destroy', $item->id) }}"
                                    method="POST"
                                    style="display:inline-block;">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin hapus data?')">

                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="5"
                                class="text-center">

                                Data peminjam belum tersedia

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

</div>

@endsection