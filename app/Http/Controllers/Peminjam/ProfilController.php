<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\ModelUser;

class ProfilController extends Controller
{
    public function index()
    {
        $data = ModelUser::findOrFail(
            Auth::id()
        );

        return view(
            'zonaPeminjam.profil.index',
            compact('data')
        );
    }

    public function update(Request $request)
    {
        $data = ModelUser::findOrFail(
            Auth::id()
        );

        $data->update([

            'nama'     => $request->nama,

            'username' => $request->username,

        ]);

        return back()->with(
            'success',
            'Profil berhasil diupdate'
        );
    }

    public function ubahPassword(Request $request)
    {
        $request->validate([

            'password_lama' => 'required',

            'password_baru' => 'required|min:6',

        ]);

        $user = ModelUser::findOrFail(
            Auth::id()
        );

        if (
            !Hash::check(
                $request->password_lama,
                $user->password
            )
        ) {

            return back()->with(
                'error',
                'Password lama salah'
            );
        }

        $user->update([

            'password' =>
                bcrypt(
                    $request->password_baru
                )

        ]);

        return back()->with(
            'success',
            'Password berhasil diubah'
        );
    }
}