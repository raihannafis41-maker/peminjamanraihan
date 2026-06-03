@extends('layouts.appuser')

@section('title', 'Detail User')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h1 class="fw-bold">
                    Detail User
                </h1>

                <a href="{{ route('user.index') }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Kembali

                </a>

            </div>

        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card shadow">

                <div class="card-body">

                    <div class="text-center mb-4">

                        @if($data->foto)

                            <img src="{{ asset('storage/' . $data->foto) }}"
                                 class="img-circle elevation-2"
                                 width="150"
                                 height="150"
                                 style="object-fit:cover;">

                        @else

                            <img src="https://ui-avatars.com/api/?name={{ urlencode($data->nama) }}&background=0D8ABC&color=fff"
                                 class="img-circle elevation-2"
                                 width="150"
                                 height="150">

                        @endif

                    </div>

                    <table class="table table-bordered">

                        <tr>
                            <th width="250">Nama</th>
                            <td>{{ $data->nama }}</td>
                        </tr>

                        <tr>
                            <th>Username</th>
                            <td>{{ $data->username }}</td>
                        </tr>

                        <tr>
                            <th>Role</th>
                            <td>

                                @if($data->role == 'admin')
                                    <span class="badge bg-danger">Admin</span>
                                @elseif($data->role == 'petugas')
                                    <span class="badge bg-warning">Petugas</span>
                                @else
                                    <span class="badge bg-success">Peminjam</span>
                                @endif

                            </td>
                        </tr>

                        <tr>
                            <th>Dibuat</th>
                            <td>{{ $data->created_at }}</td>
                        </tr>

                    </table>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection