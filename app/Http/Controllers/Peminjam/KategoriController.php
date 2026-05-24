<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;

use App\Models\ModelKategori;

class KategoriController extends Controller
{
    public function index()
    {
        $data = ModelKategori::latest()->get();

        return view(
            'zonaPeminjam.kategori.index',
            compact('data')
        );
    }
}