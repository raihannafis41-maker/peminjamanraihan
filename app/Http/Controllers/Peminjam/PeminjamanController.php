<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\ModelPeminjaman;
use App\Models\ModelAlat;

class PeminjamanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelPeminjaman::with('alat')
                ->where(
                    'user_id',
                    Auth::id()
                )
                ->latest()
                ->get();

        return view(
            'zonaPeminjam.peminjaman.index',
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
        $alat = ModelAlat::where(
                    'status',
                    'tersedia'
                )
                ->where(
                    'stok_tersedia',
                    '>',
                    0
                )
                ->get();

        return view(
            'zonaPeminjam.peminjaman.create',
            compact('alat')
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

            'alat_id'           => 'required',

            'tanggal_pinjam'    => 'required',

            'tanggal_kembali'   => 'required',

            'jumlah'            => 'required|numeric|min:1',

        ]);

        $alat = ModelAlat::findOrFail(
                    $request->alat_id
                );

        /*
        |--------------------------------------------------------------------------
        | VALIDASI STOK
        |--------------------------------------------------------------------------
        */

        if (
            $request->jumlah >
            $alat->stok_tersedia
        ) {

            return back()->with(
                'error',
                'Stok alat tidak mencukupi'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        ModelPeminjaman::create([

            'user_id'           => Auth::id(),

            'alat_id'           => $request->alat_id,

            'kode_peminjaman'   =>
                'PJM-' .
                strtoupper(
                    Str::random(8)
                ),

            'tanggal_pinjam'    =>
                $request->tanggal_pinjam,

            'tanggal_kembali'   =>
                $request->tanggal_kembali,

            'jumlah'            =>
                $request->jumlah,

            'catatan'           =>
                $request->catatan,

            'status'            => 'pending',

        ]);

        return redirect('/peminjam/peminjaman')
            ->with(
                'success',
                'Peminjaman berhasil diajukan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $data = ModelPeminjaman::with('alat')
                ->where(
                    'user_id',
                    Auth::id()
                )
                ->findOrFail($id);

        return view(
            'zonaPeminjam.peminjaman.show',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $data = ModelPeminjaman::where(
                    'user_id',
                    Auth::id()
                )
                ->where(
                    'status',
                    'pending'
                )
                ->findOrFail($id);

        $data->delete();

        return back()->with(
            'success',
            'Peminjaman berhasil dibatalkan'
        );
    }
}