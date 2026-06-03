@extends('layouts.appuser')

@section('title', 'Approval Peminjaman')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">

                <h1>Approval Peminjaman</h1>

                <a href="{{ url()->previous() }}"
                   class="btn btn-secondary">

                    <i class="fas fa-arrow-left"></i>
                    Kembali

                </a>

            </div>

        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">
                        Form Approval Peminjaman
                    </h3>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">

                        <tr>
                            <th width="250">Kode Peminjaman</th>
                            <td>{{ $data->kode_peminjaman }}</td>
                        </tr>

                        <tr>
                            <th>Nama Peminjam</th>
                            <td>{{ $data->user->nama ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Nama Alat</th>
                            <td>{{ $data->alat->nama_alat ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Pinjam</th>
                            <td>{{ $data->tanggal_pinjam }}</td>
                        </tr>

                        <tr>
                            <th>Tanggal Kembali</th>
                            <td>{{ $data->tanggal_kembali }}</td>
                        </tr>

                        <tr>
                            <th>Jumlah</th>
                            <td>{{ $data->jumlah }}</td>
                        </tr>

                        <tr>
                            <th>Catatan</th>
                            <td>{{ $data->catatan ?? '-' }}</td>
                        </tr>

                        <tr>
                            <th>Status Saat Ini</th>
                            <td>

                                @if($data->status == 'approved')

                                    <span class="badge badge-success">
                                        Approved
                                    </span>

                                @elseif($data->status == 'rejected')

                                    <span class="badge badge-danger">
                                        Rejected
                                    </span>

                                @else

                                    <span class="badge badge-warning">
                                        Pending
                                    </span>

                                @endif

                            </td>
                        </tr>

                    </table>

                    <hr>

                    @if($data->status == 'pending')

                    <form action="{{ route('approval.proses', $data->id) }}"
                          method="POST">

                        @csrf

                        <div class="form-group">

                            <label>Status Approval</label>

                            <select name="status"
                                    class="form-control"
                                    required>

                                <option value="">
                                    -- Pilih Status --
                                </option>

                                <option value="approved">
                                    Setujui Peminjaman
                                </option>

                                <option value="rejected">
                                    Tolak Peminjaman
                                </option>

                            </select>

                        </div>

                        <button type="submit"
                                class="btn btn-success">

                            <i class="fas fa-check-circle"></i>
                            Simpan Approval

                        </button>

                    </form>

                    @endif

                </div>

            </div>

        </div>

    </section>

</div>

@endsection