<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\ModelUser;

class PeminjamAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LOGIN PAGE
    |--------------------------------------------------------------------------
    */

    public function login()
    {
        return view('auth.loginpeminjam');
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER PAGE
    |--------------------------------------------------------------------------
    */

    public function register()
    {
        return view('auth.registerpeminjam');
    }

    /*
    |--------------------------------------------------------------------------
    | REGISTER PROSES
    |--------------------------------------------------------------------------
    */

    public function registerProses(Request $request)
    {
        $request->validate([

            'nama'      => 'required',
            'username'  => 'required|unique:users,username',
            'password'  => 'required|min:4',

        ]);

        ModelUser::create([

            'nama'      => $request->nama,
            'username'  => $request->username,
            'password'  => Hash::make($request->password),
            'role'      => 'peminjam',

        ]);

        return redirect('/loginpeminjam')
            ->with('success', 'Registrasi berhasil');
    }

    /*
    |--------------------------------------------------------------------------
    | LOGIN PROSES
    |--------------------------------------------------------------------------
    */

    public function loginProses(Request $request)
    {
        $request->validate([

            'username' => 'required',
            'password' => 'required',

        ]);

        $credential = [

            'username' => $request->username,
            'password' => $request->password,

        ];

        if (Auth::attempt($credential)) {

            $request->session()->regenerate();

            /*
            |--------------------------------------------------------------------------
            | REDIRECT ROLE
            |--------------------------------------------------------------------------
            */

            if (Auth::user()->role == 'peminjam') {

                return redirect()->route('peminjam.dashboard');
            }

            return redirect('/dashboard');
        }

        return back()->with(
            'error',
            'Username atau password salah'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/loginpeminjam');
    }
}