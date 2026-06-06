<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\ModelUser;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelUser::whereIn('role', [
                    'admin',
                    'petugas'
                ])
                ->latest()
                ->get();

        return view(
            'user.user.index',
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
        return view('user.user.create');
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
            'role'     => 'required',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $foto = null;

        if ($request->hasFile('foto')) {

            $foto = time() . '_' .
                    $request->foto->getClientOriginalName();

            $request->foto->storeAs(
                'user',
                $foto,
                'public'
            );
        }

        ModelUser::create([

            'nama'     => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
            'foto'     => $foto,

        ]);

        return redirect('/master/user')
            ->with(
                'success',
                'Data user berhasil ditambahkan'
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
            'user.user.show',
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
            'user.user.edit',
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
            'role'     => 'required',
            'foto'     => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ]);

        $data = ModelUser::findOrFail($id);

        $updateData = [

            'nama'     => $request->nama,
            'username' => $request->username,
            'role'     => $request->role,

        ];

        if ($request->filled('password')) {

            $updateData['password'] =
                Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {

            if (
                $data->foto &&
                Storage::disk('public')
                    ->exists('user/' . $data->foto)
            ) {

                Storage::disk('public')
                    ->delete('user/' . $data->foto);
            }

            $foto = time() . '_' .
                    $request->foto->getClientOriginalName();

            $request->foto->storeAs(
                'user',
                $foto,
                'public'
            );

            $updateData['foto'] = $foto;
        }

        $data->update($updateData);

        return redirect('/master/user')
            ->with(
                'success',
                'Data user berhasil diupdate'
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
            Storage::disk('public')
                ->exists('user/' . $data->foto)
        ) {

            Storage::disk('public')
                ->delete('user/' . $data->foto);
        }

        $data->delete();

        return back()
            ->with(
                'success',
                'Data user berhasil dihapus'
            );
    }
}