@extends('layouts.apppeminjam')

@section('title', 'Pembayaran QRIS')

@section('content')

<section class="content-header">

    <div class="container-fluid">

        <h1>Pembayaran QRIS</h1>

    </div>

</section>

<section class="content">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card card-success">

                <div class="card-header">

                    <h3 class="card-title">

                        Scan QRIS Untuk Pembayaran

                    </h3>

                </div>

                <div class="card-body text-center">

                    <h4>

                        Total Tagihan

                    </h4>

                    <h2 class="text-danger mb-4">

                        Rp {{ number_format($denda->total_denda,0,',','.') }}

                    </h2>

                    {{-- GANTI DENGAN QRIS ASLI SEKOLAH --}}
                    <img
                        src="{{ asset('images/qris.png') }}"
                        alt="QRIS"
                        class="img-fluid"
                        style="max-width:300px;">

                    <br><br>

                    <div class="alert alert-info">

                        Scan QRIS menggunakan:

                        <br>

                        DANA, OVO, GoPay, ShopeePay,
                        Mobile Banking, atau aplikasi lainnya.

                    </div>

                    <form
                        action="{{ route('zonapeminjam.konfirmasiPembayaran',$denda->id) }}"
                        method="POST">

                        @csrf

                        <button
                            type="submit"
                            class="btn btn-success">

                            Saya Sudah Membayar

                        </button>

                    </form>

                    <br>

                    <a href="{{ route('zonapeminjam.denda') }}"
                        class="btn btn-secondary">

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection