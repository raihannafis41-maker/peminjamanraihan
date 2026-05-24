@extends('layouts.appuser')

@section('title', 'Approval Peminjaman')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Approval Peminjaman</h1>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form action="/transaksi/approval/proses/{{ $data->id }}"
                          method="POST">

                        @csrf

                        <div class="form-group">

                            <label>Status Approval</label>

                            <select name="status"
                                    class="form-control">

                                <option value="approved">
                                    Approved
                                </option>

                                <option value="ditolak">
                                    Ditolak
                                </option>

                            </select>

                        </div>

                        <button class="btn btn-success">
                            Simpan Approval
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection