@extends('layouts.apptamu')

@section('title', 'Login Peminjam')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header bg-success text-white text-center">

                    <h4>
                        LOGIN PEMINJAM
                    </h4>

                </div>

                <div class="card-body">

                    @if(session('error'))

                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>

                    @endif

                    <form action="/loginpeminjam/proses"
                          method="POST">

                        @csrf

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
                                class="btn btn-success w-100">

                            LOGIN

                        </button>

                    </form>

                    <hr>

                    <div class="text-center">

                        <a href="/registerpeminjam">

                            Belum punya akun?
                            Register disini

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection