<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\ModelUser;

class PeminjamController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelUser::where('role', 'peminjam')
            ->latest()
            ->get();

        return view(
            'user.peminjam.index',
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
        return view('user.peminjam.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'nama'     => 'required',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:5',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $foto = null;

        if ($request->hasFile('foto')) {

            $file = $request->file('foto');

            $foto = time() . '_' . $file->getClientOriginalName();

            $file->storeAs(
                'public/peminjam',
                $foto
            );
        }

        ModelUser::create([

            'nama'     => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => 'peminjam',
            'foto'     => $foto,

        ]);

        return redirect('/master/peminjam')
            ->with(
                'success',
                'Data peminjam berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $data = ModelUser::findOrFail($id);

        return view(
            'user.peminjam.show',
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
        $data = ModelUser::findOrFail($id);

        return view(
            'user.peminjam.edit',
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

            'nama'     => 'required',
            'username' => 'required|unique:users,username,' . $id,
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $data = ModelUser::findOrFail($id);

        $updateData = [

            'nama'     => $request->nama,
            'username' => $request->username,

        ];

        if ($request->filled('password')) {

            $updateData['password'] =
                Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {

            if (
                $data->foto &&
                Storage::exists(
                    'public/peminjam/' . $data->foto
                )
            ) {

                Storage::delete(
                    'public/peminjam/' . $data->foto
                );
            }

            $file = $request->file('foto');

            $foto = time() . '_' . $file->getClientOriginalName();

            $file->storeAs(
                'public/peminjam',
                $foto
            );

            $updateData['foto'] = $foto;
        }

        $data->update($updateData);

        return redirect('/master/peminjam')
            ->with(
                'success',
                'Data peminjam berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $data = ModelUser::findOrFail($id);

        if (
            $data->foto &&
            Storage::exists(
                'public/peminjam/' . $data->foto
            )
        ) {

            Storage::delete(
                'public/peminjam/' . $data->foto
            );
        }

        $data->delete();

        return back()->with(
            'success',
            'Data peminjam berhasil dihapus'
        );
    }
}