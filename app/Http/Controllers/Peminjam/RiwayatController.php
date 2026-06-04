<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelPeminjaman;
use App\Models\ModelDenda;

class RiwayatController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | RIWAYAT PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelPeminjaman::with([
            'alat',
            'pengembalian'
        ])
            ->where(
                'user_id',
                Auth::id()
            )
            ->latest()
            ->get();

        return view(
            'zonapeminjam.riwayat.index',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL RIWAYAT
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $data = ModelPeminjaman::with([
            'alat',
            'pengembalian'
        ])
            ->where(
                'user_id',
                Auth::id()
            )
            ->findOrFail($id);

        return view(
            'zonapeminjam.riwayat.show',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DATA DENDA PEMINJAM
    |--------------------------------------------------------------------------
    */

    public function denda()
    {
        $data = ModelDenda::with([
            'pengembalian.peminjaman.alat'
        ])
            ->whereHas(
                'pengembalian.peminjaman',
                function ($query) {
                    $query->where(
                        'user_id',
                        Auth::id()
                    );
                }
            )
            ->latest()
            ->get();

        return view(
            'zonapeminjam.denda.index',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    public function pembayaran($id)
    {
        $denda = ModelDenda::with([
            'pengembalian.peminjaman.alat'
        ])
            ->findOrFail($id);

        return view(
            'zonapeminjam.denda.pembayaran',
            compact('denda')
        );
    }
    public function konfirmasiPembayaran($id)
    {
        $denda = ModelDenda::findOrFail($id);

        $denda->update([
            'metode_bayar' => 'qris',
            'status_bayar' => 'menunggu_verifikasi',
            'tanggal_bayar' => now(),
        ]);

        return redirect()
            ->route('zonapeminjam.denda')
            ->with(
                'success',
                'Pembayaran berhasil dikirim dan sedang menunggu verifikasi petugas.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN QRIS
    |--------------------------------------------------------------------------
    */

    public function qris($id)
    {
        $denda = ModelDenda::with([
            'pengembalian.peminjaman.alat'
        ])
            ->findOrFail($id);

        return view(
            'zonapeminjam.denda.qris',
            compact('denda')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | SURAT TEGURAN
    |--------------------------------------------------------------------------
    */

    public function suratTeguran()
    {
        $data = ModelDenda::with([
            'pengembalian.peminjaman.alat'
        ])
            ->whereHas(
                'pengembalian.peminjaman',
                function ($query) {
                    $query->where(
                        'user_id',
                        Auth::id()
                    );
                }
            )
            ->where(
                'status_bayar',
                'belum_bayar'
            )
            ->latest()
            ->get();

        return view(
            'zonapeminjam.suratteguran.index',
            compact('data')
        );
    }
}
