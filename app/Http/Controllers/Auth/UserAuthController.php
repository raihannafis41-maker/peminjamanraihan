<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    public function login()
    {
        return view('auth.loginuser');
    }

    public function loginProses(Request $request)
    {
        $credential = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($credential)) {

            if (Auth::user()->role == 'admin') {
                return redirect('/dashboard');
            }

            if (Auth::user()->role == 'petugas') {
                return redirect('/dashboard');
            }
        }

        return back()->with('error', 'Login gagal');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/loginuser');
    }
}