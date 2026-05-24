<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

use App\Models\ModelPeminjaman;
use App\Models\ModelUser;
use App\Models\ModelAlat;
use App\Models\ModelLogActivity;

class PeminjamanController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelPeminjaman::with([
                    'user',
                    'alat',
                    'approver'
                ])
                ->latest()
                ->get();

        return view(
            'user.peminjaman.index',
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
        $user = ModelUser::where(
                    'role',
                    'peminjam'
                )->get();

        $alat = ModelAlat::where(
                    'status',
                    '!=',
                    'habis'
                )->get();

        return view(
            'user.peminjaman.create',
            compact(
                'user',
                'alat'
            )
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

            'user_id'           => 'required',

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
        | CEK STOK
        |--------------------------------------------------------------------------
        */

        if (
            $request->jumlah >
            $alat->stok_tersedia
        ) {

            return back()->with(
                'error',
                'Jumlah pinjam melebihi stok tersedia'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        $peminjaman = ModelPeminjaman::create([

            'user_id'         => $request->user_id,

            'alat_id'         => $request->alat_id,

            'kode_peminjaman' =>
                'PJM-' .
                strtoupper(
                    Str::random(8)
                ),

            'tanggal_pinjam'  =>
                $request->tanggal_pinjam,

            'tanggal_kembali' =>
                $request->tanggal_kembali,

            'jumlah'          =>
                $request->jumlah,

            'catatan'         =>
                $request->catatan,

            'status'          => 'pending',

        ]);

        /*
        |--------------------------------------------------------------------------
        | LOG ACTIVITY
        |--------------------------------------------------------------------------
        */

        ModelLogActivity::create([

            'user_id' => Auth::id(),

            'aktivitas' =>
                'Menambahkan peminjaman dengan kode : '
                . $peminjaman->kode_peminjaman

        ]);

        return redirect('/transaksi/peminjaman')
            ->with(
                'success',
                'Data peminjaman berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $data = ModelPeminjaman::with([
                    'user',
                    'alat',
                    'approver'
                ])
                ->findOrFail($id);

        return view(
            'user.peminjaman.show',
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
        $data = ModelPeminjaman::findOrFail($id);

        $user = ModelUser::where(
                    'role',
                    'peminjam'
                )->get();

        $alat = ModelAlat::all();

        return view(
            'user.peminjaman.edit',
            compact(
                'data',
                'user',
                'alat'
            )
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

            'user_id'         => 'required',

            'alat_id'         => 'required',

            'tanggal_pinjam'  => 'required',

            'tanggal_kembali' => 'required',

            'jumlah'          => 'required|numeric|min:1',

        ]);

        $data = ModelPeminjaman::findOrFail($id);

        $data->update([

            'user_id'         =>
                $request->user_id,

            'alat_id'         =>
                $request->alat_id,

            'tanggal_pinjam'  =>
                $request->tanggal_pinjam,

            'tanggal_kembali' =>
                $request->tanggal_kembali,

            'jumlah'          =>
                $request->jumlah,

            'catatan'         =>
                $request->catatan,

        ]);

        return redirect('/transaksi/peminjaman')
            ->with(
                'success',
                'Data peminjaman berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $data = ModelPeminjaman::findOrFail($id);

        $data->delete();

        return back()
            ->with(
                'success',
                'Data peminjaman berhasil dihapus'
            );
    }
}