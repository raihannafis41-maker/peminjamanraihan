<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| DEFAULT LOGIN ROUTE
|--------------------------------------------------------------------------
|
| Laravel auth middleware otomatis mencari route bernama "login"
| Jadi diarahkan ke login peminjam.
|
*/

Route::get('/login', function () {

    return redirect('/loginpeminjam');
})->name('login');

/*
|--------------------------------------------------------------------------
| CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Landing\LandingController;

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\Auth\PeminjamAuthController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\PeminjamDashboardController;

/*
|--------------------------------------------------------------------------
| MASTER CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Master\UserController;
use App\Http\Controllers\Master\PeminjamController;
use App\Http\Controllers\Master\KategoriController;
use App\Http\Controllers\Master\KondisiController;
use App\Http\Controllers\Master\AlatController;

/*
|--------------------------------------------------------------------------
| TRANSAKSI CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Transaksi\PeminjamanController;
use App\Http\Controllers\Transaksi\PengembalianController;
use App\Http\Controllers\Transaksi\DendaController;
use App\Http\Controllers\Transaksi\ApprovalController;
use App\Http\Controllers\Transaksi\LogActivityController;

/*
|--------------------------------------------------------------------------
| LAPORAN CONTROLLER
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\Laporan\LaporanPeminjamanController;
use App\Http\Controllers\Laporan\LaporanPengembalianController;
use App\Http\Controllers\Laporan\LaporanDendaController;

/*
|--------------------------------------------------------------------------
| CONTROLLER KHUSUS PEMINJAM
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\Peminjam\DashboardController as ZonaPeminjamDashboardController;
use App\Http\Controllers\Peminjam\AlatController as ZonaPeminjamAlatController;
use App\Http\Controllers\Peminjam\KategoriController as ZonaPeminjamKategoriController;
use App\Http\Controllers\Peminjam\PeminjamanController as ZonaPeminjamPeminjamanController;
use App\Http\Controllers\Peminjam\RiwayatController as ZonaRiwayatController;

/*
|--------------------------------------------------------------------------
| LANDING PAGE
|--------------------------------------------------------------------------
*/

Route::get(
    '/',
    [LandingController::class, 'home']
);

Route::get(
    '/daftarkategori',
    [LandingController::class, 'daftarKategori']
);

Route::get(
    '/kategori/{id}',
    [LandingController::class, 'kategori']
);

Route::get(
    '/daftaralat',
    [LandingController::class, 'daftarAlat']
);

Route::get(
    '/tentang',
    [LandingController::class, 'tentang']
);

Route::get(
    '/kontak',
    [LandingController::class, 'kontak']
);

/*
|--------------------------------------------------------------------------
| AUTH USER (ADMIN & PETUGAS)
|--------------------------------------------------------------------------
*/

Route::get(
    '/loginuser',
    [UserAuthController::class, 'login']
)->name('loginuser');

Route::post(
    '/loginuser/proses',
    [UserAuthController::class, 'loginProses']
)->name('loginuser.proses');

Route::get(
    '/logoutuser',
    [UserAuthController::class, 'logout']
)->name('logoutuser');

/*
|--------------------------------------------------------------------------
| AUTH PEMINJAM
|--------------------------------------------------------------------------
*/

Route::get(
    '/loginpeminjam',
    [PeminjamAuthController::class, 'login']
)->name('loginpeminjam');

Route::post(
    '/loginpeminjam/proses',
    [PeminjamAuthController::class, 'loginProses']
)->name('loginpeminjam.proses');

Route::get(
    '/registerpeminjam',
    [PeminjamAuthController::class, 'register']
)->name('registerpeminjam');

Route::post(
    '/registerpeminjam/proses',
    [PeminjamAuthController::class, 'registerProses']
)->name('registerpeminjam.proses');

Route::get(
    '/logoutpeminjam',
    [PeminjamAuthController::class, 'logout']
)->name('logoutpeminjam');

/*
|--------------------------------------------------------------------------
| DASHBOARD ADMIN & PETUGAS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,petugas'])
    ->group(function () {

        Route::get(
            '/dashboard',
            [DashboardController::class, 'index']
        )->name('dashboard');
    });

/*
|--------------------------------------------------------------------------
| MASTER DATA
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,petugas'])
    ->prefix('master')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | USER
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'user',
            UserController::class
        );

        /*
        |--------------------------------------------------------------------------
        | PEMINJAM
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'peminjam',
            PeminjamController::class
        );

        /*
        |--------------------------------------------------------------------------
        | KATEGORI
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'kategori',
            KategoriController::class
        );

        /*
        |--------------------------------------------------------------------------
        | KONDISI
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'kondisi',
            KondisiController::class
        );

        /*
        |--------------------------------------------------------------------------
        | ALAT
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'alat',
            AlatController::class
        );
    });

/*
|--------------------------------------------------------------------------
| TRANSAKSI ADMIN & PETUGAS
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,petugas'])
    ->prefix('transaksi')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'peminjaman',
            PeminjamanController::class
        );

        /*
        |--------------------------------------------------------------------------
        | PENGEMBALIAN
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'pengembalian',
            PengembalianController::class
        );

        /*
        |--------------------------------------------------------------------------
        | DENDA
        |--------------------------------------------------------------------------
        */

        Route::resource(
            'denda',
            DendaController::class
        );

        /*
        |--------------------------------------------------------------------------
        | APPROVAL
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/approval/{id}',
            [ApprovalController::class, 'approval']
        )->name('approval');

        Route::post(
            '/approval/proses/{id}',
            [ApprovalController::class, 'approvalProses']
        )->name('approval.proses');


        /*
        |--------------------------------------------------------------------------
        | LOG ACTIVITY
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/logactivity',
            [LogActivityController::class, 'index']
        )->name('logactivity');
    });

/*
|--------------------------------------------------------------------------
| DASHBOARD PEMINJAM
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:peminjam'])
    ->group(function () {

        Route::get(
            '/dashboardpeminjam',
            [PeminjamDashboardController::class, 'index']
        )->name('dashboardpeminjam');
    });

/*
|--------------------------------------------------------------------------
| ZONA PEMINJAM
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:peminjam'])
    ->prefix('zonapeminjam')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | DASHBOARD PEMINJAM
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [ZonaPeminjamDashboardController::class, 'index']
        )->name('zonapeminjam.dashboard');

        /*
        |--------------------------------------------------------------------------
        | LIHAT ALAT
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/alat',
            [ZonaPeminjamAlatController::class, 'index']
        )->name('zonapeminjam.alat');

        /*
        |--------------------------------------------------------------------------
        | DETAIL ALAT
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/alat/{id}',
            [ZonaPeminjamAlatController::class, 'show']
        )->name('zonapeminjam.alat.show');

        /*
        |--------------------------------------------------------------------------
        | LIHAT KATEGORI
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/kategori',
            [ZonaPeminjamKategoriController::class, 'index']
        )->name('zonapeminjam.kategori');

        /*
        |--------------------------------------------------------------------------
        | AJUKAN PINJAM
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pinjam/{id}',
            [ZonaPeminjamPeminjamanController::class, 'create']
        )->name('zonapeminjam.pinjam');

        Route::post(
            '/pinjam/store',
            [ZonaPeminjamPeminjamanController::class, 'store']
        )->name('zonapeminjam.pinjam.store');

        /*
        |--------------------------------------------------------------------------
        | STATUS PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/status',
            [ZonaPeminjamPeminjamanController::class, 'status']
        )->name('zonapeminjam.status');


        /*
        |--------------------------------------------------------------------------
        | RIWAYAT PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/riwayat',
            [ZonaRiwayatController::class, 'index']
        )->name('zonapeminjam.riwayat');

        Route::get(
            '/riwayat/{id}',
            [ZonaRiwayatController::class, 'show']
        )->name('zonapeminjam.riwayat.show');

        Route::post(
            '/kembalikan/{id}',
            [ZonaPeminjamPeminjamanController::class, 'kembalikan']
        )->name('zonapeminjam.kembalikan');
    });
/*
|--------------------------------------------------------------------------
| LAPORAN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin,petugas'])
    ->prefix('laporan')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | LAPORAN UTAMA
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/',
            [LaporanController::class, 'index']
        )->name('laporan.index');

        /*
        |--------------------------------------------------------------------------
        | LAPORAN PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/peminjaman',
            [LaporanPeminjamanController::class, 'index']
        )->name('laporan.peminjaman');

        Route::get(
            '/cetakpeminjaman',
            [LaporanPeminjamanController::class, 'cetak']
        )->name('laporan.cetakpeminjaman');

        /*
        |--------------------------------------------------------------------------
        | LAPORAN PENGEMBALIAN
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/pengembalian',
            [LaporanPengembalianController::class, 'index']
        )->name('laporan.pengembalian');

        Route::get(
            '/cetakpengembalian',
            [LaporanPengembalianController::class, 'cetak']
        )->name('laporan.cetakpengembalian');

        /*
        |--------------------------------------------------------------------------
        | LAPORAN DENDA
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/denda',
            [LaporanDendaController::class, 'index']
        )->name('laporan.denda');

        Route::get(
            '/cetakdenda',
            [LaporanDendaController::class, 'cetak']
        )->name('laporan.cetakdenda');
    });
