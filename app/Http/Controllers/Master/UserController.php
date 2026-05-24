<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        ]);

        ModelUser::create([

            'nama'     => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role'     => $request->role,

        ]);

        return redirect('/master/user')
            ->with('success', 'Data user berhasil ditambahkan');
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

        ]);

        $data = ModelUser::findOrFail($id);

        $updateData = [

            'nama'     => $request->nama,
            'username' => $request->username,
            'role'     => $request->role,

        ];

        if ($request->password) {

            $updateData['password'] =
                Hash::make($request->password);
        }

        $data->update($updateData);

        return redirect('/master/user')
            ->with('success', 'Data user berhasil diupdate');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        ModelUser::findOrFail($id)->delete();

        return back()
            ->with('success', 'Data user berhasil dihapus');
    }
}