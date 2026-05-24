<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

class PeminjamDashboardController extends Controller
{
    public function index()
    {
        return view('zonapeminjam.dashboard.peminjam');
    }
}