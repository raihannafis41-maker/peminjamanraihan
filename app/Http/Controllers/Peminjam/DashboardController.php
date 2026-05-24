<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelPeminjaman;
use App\Models\ModelSuratTeguran;
use App\Models\ModelDenda;
use App\Models\ModelAlat;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        $totalPeminjaman = ModelPeminjaman::where(
            'user_id',
            $userId
        )->count();

        $peminjamanAktif = ModelPeminjaman::where(
            'user_id',
            $userId
        )->where(
            'status',
            'approved'
        )->count();

        $totalDenda = ModelDenda::whereHas(
            'pengembalian.peminjaman',
            function ($query) use ($userId) {

                $query->where(
                    'user_id',
                    $userId
                );
            }
        )->sum('total_denda');

        $teguran = ModelSuratTeguran::where(
            'user_id',
            $userId
        )->latest()->get();

        $alatTersedia = ModelAlat::where(
            'status',
            'tersedia'
        )->count();

        return view(
            'zonaPeminjam.dashboard.peminjam',
            compact(
                'totalPeminjaman',
                'peminjamanAktif',
                'totalDenda',
                'teguran',
                'alatTersedia'
            )
        );
    }
}