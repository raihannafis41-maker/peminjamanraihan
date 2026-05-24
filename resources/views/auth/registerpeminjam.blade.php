@extends('layouts.apptamu')

@section('title', 'Register Peminjam')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-warning text-dark text-center">

                    <h4>
                        REGISTER PEMINJAM
                    </h4>

                </div>

                <div class="card-body">

                    <form action="/registerpeminjam/proses"
                          method="POST">

                        @csrf

                        <div class="mb-3">

                            <label>
                                Nama Lengkap
                            </label>

                            <input type="text"
                                   name="nama"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>
                                Username
                            </label>

                            <input type="text"
                                   name="username"
                                   class="form-control"
                                   required>

                        </div>

                        <div class="mb-3">

                            <label>
                                Password
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   required>

                        </div>

                        <button type="submit"
                                class="btn btn-warning w-100">

                            REGISTER

                        </button>

                    </form>

                    <hr>

                    <div class="text-center">

                        <a href="/loginpeminjam">

                            Sudah punya akun?
                            Login disini

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection