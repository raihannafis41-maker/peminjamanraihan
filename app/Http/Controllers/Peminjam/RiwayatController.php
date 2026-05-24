<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelPeminjaman;

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
}