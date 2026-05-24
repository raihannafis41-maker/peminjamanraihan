<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;

use App\Models\ModelPeminjaman;

class LaporanPeminjamanController extends Controller
{
    public function index()
    {
        $data = ModelPeminjaman::latest()->get();

        return view('user.laporan.laporanpeminjaman',
            compact('data'));
    }

    public function cetak()
    {
        $data = ModelPeminjaman::latest()->get();

        return view('user.laporan.cetaklaporanpeminjaman',
            compact('data'));
    }
}