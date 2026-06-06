@extends('layouts.appuser')

@section('title', 'Data Peminjam')

@section('content')

<section class="content-header">
    <div class="container-fluid">

        <div class="d-flex justify-content-between align-items-center">

            <h1 class="fw-bold">
                Data Peminjam
            </h1>

            <a href="{{ route('peminjam.create') }}"
               class="btn btn-primary">

                <i class="fas fa-plus"></i>
                Tambah Peminjam

            </a>

        </div>

    </div>
</section>

<section class="content">

    <div class="container-fluid">

        <div class="card shadow-sm">

            <div class="card-body table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="60">No</th>

                            <th width="100">Foto</th>

                            <th>Nama</th>

                            <th>Username</th>

                            <th>Role</th>

                            <th width="220">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($data as $item)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-center">

                                @if($item->foto)

                                    <img src="{{ asset('storage/peminjam/'.$item->foto) }}"
                                         width="70"
                                         height="70"
                                         class="rounded-circle border"
                                         style="object-fit:cover;">

                                @else

                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($item->nama) }}&background=0D8ABC&color=fff"
                                         width="70"
                                         height="70"
                                         class="rounded-circle border">

                                @endif

                            </td>

                            <td>
                                {{ $item->nama }}
                            </td>

                            <td>
                                {{ $item->username }}
                            </td>

                            <td>

                                <span class="badge bg-success">
                                    Peminjam
                                </span>

                            </td>

                            <td>

                                <a href="{{ route('peminjam.show', $item->id) }}"
                                   class="btn btn-info btn-sm">

                                    <i class="fas fa-eye"></i>
                                    Detail

                                </a>

                                <a href="{{ route('peminjam.edit', $item->id) }}"
                                   class="btn btn-warning btn-sm">

                                    <i class="fas fa-edit"></i>
                                    Edit

                                </a>

                                <form action="{{ route('peminjam.destroy', $item->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin hapus data peminjam?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm">

                                        <i class="fas fa-trash"></i>
                                        Hapus

                                    </button>

                                </form>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6"
                                class="text-center text-muted">

                                Belum ada data peminjam

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</section>

@endsection