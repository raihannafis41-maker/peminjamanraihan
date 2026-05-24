<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelUser;
use App\Models\ModelPeminjam;
use App\Models\ModelKategori;
use App\Models\ModelAlat;
use App\Models\ModelPeminjaman;
use App\Models\ModelPengembalian;
use App\Models\ModelDenda;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /*
        |--------------------------------------------------------------------------
        | DATA DASHBOARD
        |--------------------------------------------------------------------------
        */

        $totalUser             = ModelUser::count();
        $totalPeminjam         = ModelPeminjam::count();
        $totalKategori         = ModelKategori::count();
        $totalAlat             = ModelAlat::count();
        $totalPeminjaman       = ModelPeminjaman::count();
        $totalPengembalian     = ModelPengembalian::count();
        $totalDenda            = ModelDenda::count();

        $peminjamanPending = ModelPeminjaman::where(
            'status',
            'pending'
        )->count();

        $peminjamanApproved = ModelPeminjaman::where(
            'status',
            'approved'
        )->count();

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD ADMIN
        |--------------------------------------------------------------------------
        */

        if ($user->role == 'admin') {

            return view(
                'user.dashboard.dashboardadmin',
                compact(
                    'totalUser',
                    'totalPeminjam',
                    'totalKategori',
                    'totalAlat',
                    'totalPeminjaman',
                    'totalPengembalian',
                    'totalDenda',
                    'peminjamanPending',
                    'peminjamanApproved'
                )
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD PETUGAS
        |--------------------------------------------------------------------------
        */

        if ($user->role == 'petugas') {

            return view(
                'user.dashboard.dashboardpetugas',
                compact(
                    'totalPeminjam',
                    'totalKategori',
                    'totalAlat',
                    'totalPeminjaman',
                    'totalPengembalian',
                    'totalDenda',
                    'peminjamanPending',
                    'peminjamanApproved'
                )
            );
        }

        /*
        |--------------------------------------------------------------------------
        | DEFAULT
        |--------------------------------------------------------------------------
        */

        abort(403);
    }
}