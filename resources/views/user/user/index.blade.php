@extends('layouts.appuser')

@section('title', 'Data User')

@section('content')

<section class="content-header">

    <div class="d-flex justify-content-between align-items-center">

        <h1 class="fw-bold">Data User</h1>

        <a href="{{ route('user.create') }}" class="btn btn-primary">
            + Tambah User
        </a>

    </div>

</section>

<section class="content">

    <div class="card shadow-sm">

        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($data as $item)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td class="text-center">

                            @if($item->foto)
                            <img src="{{ asset('storage/'.$item->foto) }}"
                                width="60" height="60"
                                class="rounded-circle"
                                style="object-fit:cover;">
                            @else
                            <img src="https://ui-avatars.com/api/?name={{ $item->nama }}"
                                width="60" height="60"
                                class="rounded-circle">
                            @endif

                        </td>

                        <td>{{ $item->nama }}</td>
                        <td>{{ $item->username }}</td>

                        <td>
                            @if($item->role == 'admin')
                            <span class="badge bg-danger">Admin</span>
                            @elseif($item->role == 'petugas')
                            <span class="badge bg-warning">Petugas</span>
                            @else
                            <span class="badge bg-success">Peminjam</span>
                            @endif
                        </td>

                        <td class="d-flex gap-1">

                            <a href="{{ route('user.show',$item->id) }}" class="btn btn-info btn-sm">Detail</a>

                            <a href="{{ route('user.edit',$item->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('user.destroy',$item->id) }}" method="POST"
                                onsubmit="return confirm('Hapus user?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger btn-sm">Hapus</button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center text-muted">
                            Tidak ada data user
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</section>

@endsection