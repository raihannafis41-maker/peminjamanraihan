<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelKategori;
use App\Models\ModelAlat;

class LandingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HOME
    |--------------------------------------------------------------------------
    */

    public function home()
    {
        $alat = ModelAlat::latest()
                    ->take(6)
                    ->get();

        $kategori = ModelKategori::all();

        return view('landing.home', compact(
            'alat',
            'kategori'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | DAFTAR KATEGORI
    |--------------------------------------------------------------------------
    */

    public function daftarKategori()
    {
        $kategori = ModelKategori::latest()->get();

        return view('landing.daftarkategori', compact(
            'kategori'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL KATEGORI
    |--------------------------------------------------------------------------
    */

    public function kategori($id)
    {
        $kategori = ModelKategori::findOrFail($id);

        $alat = ModelAlat::where('kategori_id', $id)
                    ->latest()
                    ->get();

        return view('landing.kategori', compact(
            'kategori',
            'alat'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | DAFTAR ALAT
    |--------------------------------------------------------------------------
    */

    public function daftarAlat()
    {
        $alat = ModelAlat::with('kategori')
                    ->latest()
                    ->get();

        return view('landing.daftaralat', compact(
            'alat'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | TENTANG
    |--------------------------------------------------------------------------
    */

    public function tentang()
    {
        return view('landing.tentang');
    }

    /*
    |--------------------------------------------------------------------------
    | KONTAK
    |--------------------------------------------------------------------------
    */

    public function kontak()
    {
        return view('landing.kontak');
    }
}