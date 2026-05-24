<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelAlat;
use App\Models\ModelKategori;

class AlatController extends Controller
{
    public function index()
    {
        $data = ModelAlat::with('kategori')
                ->where(
                    'status',
                    '!=',
                    'rusak'
                )
                ->latest()
                ->get();

        return view(
            'zonaPeminjam.alat.index',
            compact('data')
        );
    }

    public function show($id)
    {
        $data = ModelAlat::with('kategori')
                ->findOrFail($id);

        return view(
            'zonaPeminjam.alat.show',
            compact('data')
        );
    }

    public function kategori($id)
    {
        $kategori = ModelKategori::findOrFail($id);

        $data = ModelAlat::where(
                    'kategori_id',
                    $id
                )
                ->get();

        return view(
            'zonaPeminjam.alat.kategori',
            compact(
                'data',
                'kategori'
            )
        );
    }

    public function search(Request $request)
    {
        $data = ModelAlat::where(
                    'nama_alat',
                    'like',
                    '%' .
                    $request->search .
                    '%'
                )
                ->get();

        return view(
            'zonaPeminjam.alat.index',
            compact('data')
        );
    }
}