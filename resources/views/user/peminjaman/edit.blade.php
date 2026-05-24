@extends('layouts.appuser')

@section('title', 'Edit Peminjaman')

@section('content')

<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <h1>Edit Peminjaman</h1>
        </div>
    </section>

    <section class="content">

        <div class="container-fluid">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('peminjaman.update', $data->id) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Jumlah</label>

                            <input type="number"
                                   name="jumlah"
                                   value="{{ $data->jumlah }}"
                                   class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Status</label>

                            <input type="text"
                                   name="status"
                                   value="{{ $data->status }}"
                                   class="form-control">
                        </div>

                        <button class="btn btn-warning">
                            Update
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </section>

</div>

@endsection