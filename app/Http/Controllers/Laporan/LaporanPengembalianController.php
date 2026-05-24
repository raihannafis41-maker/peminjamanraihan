<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;

use App\Models\ModelPengembalian;

class LaporanPengembalianController extends Controller
{
    public function index()
    {
        $data = ModelPengembalian::latest()->get();

        return view('user.laporan.laporanpengembalian',
            compact('data'));
    }

    public function cetak()
    {
        $data = ModelPengembalian::latest()->get();

        return view('user.laporan.cetaklaporanpengembalian',
            compact('data'));
    }
}