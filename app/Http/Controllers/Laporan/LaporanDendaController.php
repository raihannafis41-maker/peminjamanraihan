<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;
use App\Models\ModelDenda;

class LaporanDendaController extends Controller
{
    public function index()
    {
        $data = ModelDenda::with([
            'pengembalian.peminjaman.user',
            'pengembalian.peminjaman.alat'
        ])
        ->latest()
        ->get();

        return view(
            'user.laporan.laporandenda',
            compact('data')
        );
    }

    public function cetak()
    {
        $data = ModelDenda::with([
            'pengembalian.peminjaman.user',
            'pengembalian.peminjaman.alat'
        ])
        ->latest()
        ->get();

        return view(
            'user.laporan.cetaklaporandenda',
            compact('data')
        );
    }
}