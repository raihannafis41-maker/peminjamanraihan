@extends('layouts.apptamu')

@section('title', 'Kontak')

@section('content')

<div class="container py-5">

    <div class="text-center mb-5">

        <h2 class="fw-bold">
            Kontak Kami
        </h2>

        <p class="text-muted">
            Hubungi kami jika ada pertanyaan
        </p>

    </div>

    <div class="row justify-content-center">

        <div class="col-md-7">

            <div class="card shadow border-0">

                <div class="card-body p-4">

                    <form>

                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email"
                                   class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Pesan</label>
                            <textarea class="form-control"
                                      rows="5"></textarea>
                        </div>

                        <button class="btn btn-primary">
                            Kirim Pesan
                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection