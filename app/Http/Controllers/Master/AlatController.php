<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\ModelAlat;
use App\Models\ModelKategori;
use App\Models\ModelKondisi;

class AlatController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelAlat::with([
                    'kategori',
                    'kondisi'
                ])
                ->latest()
                ->get();

        return view(
            'user.alat.index',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $kategori = ModelKategori::all();

        $kondisi = ModelKondisi::all();

        return view(
            'user.alat.create',
            compact(
                'kategori',
                'kondisi'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'kategori_id' => 'required',
            'kondisi_id'  => 'required',
            'nama_alat'   => 'required',
            'stok'        => 'required|numeric|min:1',

        ]);

        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = time() . '.' .
                    $request->foto->extension();

            $request->foto->move(
                public_path('uploads/alat'),
                $foto
            );
        }

        $stokStatus = 'tersedia';

        if ($request->stok <= 0) {
            $stokStatus = 'habis';
        }

        ModelAlat::create([

            'kategori_id'   => $request->kategori_id,

            'kondisi_id'    => $request->kondisi_id,

            'kode_alat'     => 'ALT-' .
                                strtoupper(
                                    Str::random(6)
                                ),

            'nama_alat'     => $request->nama_alat,

            'stok'          => $request->stok,

            'stok_tersedia' => $request->stok,

            'stok_dipinjam' => 0,

            'lokasi'        => $request->lokasi,

            'deskripsi'     => $request->deskripsi,

            'foto'          => $foto,

            'status'        => $stokStatus,

        ]);

        return redirect('/master/alat')
            ->with('success', 'Data alat berhasil ditambahkan');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $data = ModelAlat::with([
                    'kategori',
                    'kondisi'
                ])
                ->findOrFail($id);

        return view(
            'user.alat.show',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $data = ModelAlat::findOrFail($id);

        $kategori = ModelKategori::all();

        $kondisi = ModelKondisi::all();

        return view(
            'user.alat.edit',
            compact(
                'data',
                'kategori',
                'kondisi'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $request->validate([

            'kategori_id' => 'required',
            'kondisi_id'  => 'required',
            'nama_alat'   => 'required',
            'stok'        => 'required|numeric|min:1',

        ]);

        $data = ModelAlat::findOrFail($id);

        $foto = $data->foto;

        if ($request->hasFile('foto')) {

            $foto = time() . '.' .
                    $request->foto->extension();

            $request->foto->move(
                public_path('uploads/alat'),
                $foto
            );
        }

        $stokTersedia =
            $request->stok -
            $data->stok_dipinjam;

        $status = 'tersedia';

        if ($stokTersedia <= 0) {
            $status = 'habis';
        }

        $data->update([

            'kategori_id'   => $request->kategori_id,

            'kondisi_id'    => $request->kondisi_id,

            'nama_alat'     => $request->nama_alat,

            'stok'          => $request->stok,

            'stok_tersedia' => $stokTersedia,

            'lokasi'        => $request->lokasi,

            'deskripsi'     => $request->deskripsi,

            'foto'          => $foto,

            'status'        => $status,

        ]);

        return redirect('/master/alat')
            ->with('success', 'Data alat berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $data = ModelAlat::findOrFail($id);

        if ($data->foto) {

            $path = public_path(
                'uploads/alat/' . $data->foto
            );

            if (file_exists($path)) {
                unlink($path);
            }
        }

        $data->delete();

        return back()
            ->with('success', 'Data alat berhasil dihapus');
    }
}