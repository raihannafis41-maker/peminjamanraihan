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
        if (Auth::check()) {

            if (Auth::user()->role == 'peminjam') {
                return redirect()->route('zonapeminjam.dashboard');
            }

            return redirect()->route('dashboard');
        }

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

            'nama' => 'required|string|max:255',

            'username' => 'required|string|max:255|unique:users,username',

            'password' => 'required|min:4|confirmed',

        ]);

        ModelUser::create([

            'nama' => $request->nama,

            'username' => $request->username,

            'password' => Hash::make(
                $request->password
            ),

            'role' => 'peminjam',

        ]);

        return redirect()
            ->route('loginpeminjam')
            ->with(
                'success',
                'Registrasi berhasil, silakan login.'
            );
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
            | REDIRECT BERDASARKAN ROLE
            |--------------------------------------------------------------------------
            */

            if (Auth::user()->role == 'peminjam') {

                return redirect()->route(
                    'zonapeminjam.dashboard'
                );
            }

            if (
                Auth::user()->role == 'admin' ||
                Auth::user()->role == 'petugas'
            ) {

                return redirect()->route(
                    'dashboard'
                );
            }

            Auth::logout();

            return redirect()
                ->route('loginpeminjam')
                ->with(
                    'error',
                    'Role pengguna tidak dikenali.'
                );
        }

        return back()
            ->withInput()
            ->with(
                'error',
                'Username atau password salah.'
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

        return redirect()
            ->route('loginpeminjam')
            ->with(
                'success',
                'Berhasil logout.'
            );
    }
}