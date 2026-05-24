<?php

namespace App\Http\Controllers\Laporan;

use App\Http\Controllers\Controller;

class LaporanController extends Controller
{
    public function index()
    {
        return view('user.laporan.index');
    }
}