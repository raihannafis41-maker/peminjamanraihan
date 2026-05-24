<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelKondisi;

class KondisiController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelKondisi::latest()->get();

        return view(
            'user.kondisi.index',
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
        return view('user.kondisi.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'nama_kondisi' => 'required|max:255',

            'keterangan'   => 'nullable',

        ]);

        ModelKondisi::create([

            'nama_kondisi' => $request->nama_kondisi,

            'keterangan'   => $request->keterangan,

        ]);

        return redirect('/master/kondisi')
            ->with(
                'success',
                'Data kondisi berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $data = ModelKondisi::findOrFail($id);

        return view(
            'user.kondisi.show',
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
        $data = ModelKondisi::findOrFail($id);

        return view(
            'user.kondisi.edit',
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

            'nama_kondisi' => 'required|max:255',

            'keterangan'   => 'nullable',

        ]);

        $data = ModelKondisi::findOrFail($id);

        $data->update([

            'nama_kondisi' => $request->nama_kondisi,

            'keterangan'   => $request->keterangan,

        ]);

        return redirect('/master/kondisi')
            ->with(
                'success',
                'Data kondisi berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $data = ModelKondisi::findOrFail($id);

        $data->delete();

        return back()
            ->with(
                'success',
                'Data kondisi berhasil dihapus'
            );
    }
}