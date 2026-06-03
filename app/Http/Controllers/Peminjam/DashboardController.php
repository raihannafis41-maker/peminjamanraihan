<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelPeminjaman;
use App\Models\ModelSuratTeguran;
use App\Models\ModelPengembalian;
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

        $totalDenda = ModelPengembalian::whereHas(
            'peminjaman',
            function ($query) use ($userId) {

                $query->where(
                    'user_id',
                    $userId
                );
            }
        )->sum('denda');

        try {

            $teguran = ModelSuratTeguran::where(
                'user_id',
                $userId
            )->latest()->get();

        } catch (\Exception $e) {

            $teguran = collect();

        }

        $alatTersedia = ModelAlat::where(
            'status',
            'tersedia'
        )->count();

        return view(
            'zonapeminjam.dashboard.peminjam',
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