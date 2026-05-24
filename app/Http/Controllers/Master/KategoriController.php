<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelKategori;

class KategoriController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelKategori::latest()->get();

        return view(
            'user.kategori.index',
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
        return view('user.kategori.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'nama_kategori' => 'required|max:255',

            'deskripsi'     => 'nullable',

        ]);

        ModelKategori::create([

            'nama_kategori' => $request->nama_kategori,

            'deskripsi'     => $request->deskripsi,

        ]);

        return redirect('/master/kategori')
            ->with(
                'success',
                'Data kategori berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $data = ModelKategori::findOrFail($id);

        return view(
            'user.kategori.show',
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
        $data = ModelKategori::findOrFail($id);

        return view(
            'user.kategori.edit',
            compact('data')
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

            'nama_kategori' => 'required|max:255',

            'deskripsi'     => 'nullable',

        ]);

        $data = ModelKategori::findOrFail($id);

        $data->update([

            'nama_kategori' => $request->nama_kategori,

            'deskripsi'     => $request->deskripsi,

        ]);

        return redirect('/master/kategori')
            ->with(
                'success',
                'Data kategori berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $data = ModelKategori::findOrFail($id);

        $data->delete();

        return back()
            ->with(
                'success',
                'Data kategori berhasil dihapus'
            );
    }
}