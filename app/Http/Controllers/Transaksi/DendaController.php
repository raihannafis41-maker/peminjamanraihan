<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ModelDenda;
use App\Models\ModelPengembalian;

class DendaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelDenda::with(
            'pengembalian.peminjaman.user',
            'pengembalian.peminjaman.alat'
        )
            ->latest()
            ->get();

        return view(
            'user.denda.index',
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
        $pengembalian = ModelPengembalian::latest()->get();

        return view(
            'user.denda.create',
            compact('pengembalian')
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

            'pengembalian_id' => 'required',

            'total_denda'     => 'required|numeric|min:0',

            'status_bayar'    => 'required',

        ]);

        ModelDenda::create([

            'pengembalian_id' => $request->pengembalian_id,

            'total_denda'     => $request->total_denda,

            'status_bayar'    => $request->status_bayar,

        ]);

        return redirect('/transaksi/denda')
            ->with(
                'success',
                'Data denda berhasil ditambahkan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $data = ModelDenda::with(
            'pengembalian.peminjaman.user',
            'pengembalian.peminjaman.alat'
        )
            ->findOrFail($id);

        return view(
            'user.denda.show',
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
        $data = ModelDenda::findOrFail($id);

        $pengembalian = ModelPengembalian::latest()->get();

        return view(
            'user.denda.edit',
            compact(
                'data',
                'pengembalian'
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

            'pengembalian_id' => 'required',

            'total_denda'     => 'required|numeric|min:0',

            'status_bayar'    => 'required',

        ]);

        $data = ModelDenda::findOrFail($id);

        $data->update([

            'pengembalian_id' => $request->pengembalian_id,

            'total_denda'     => $request->total_denda,

            'status_bayar'    => $request->status_bayar,

        ]);

        return redirect('/transaksi/denda')
            ->with(
                'success',
                'Data denda berhasil diupdate'
            );
    }

    public function bayar(Request $request, $id)
    {
        $denda = ModelDenda::findOrFail($id);

        $request->validate([

            'metode_bayar' => 'required'

        ]);

        $bukti = $denda->bukti_bayar;

        if (
            $request->metode_bayar == 'non_cash'
            && $request->hasFile('bukti_bayar')
        ) {

            $bukti =
                time() . '_' .
                $request->file('bukti_bayar')
                ->getClientOriginalName();

            $request->file('bukti_bayar')
                ->storeAs(
                    'bukti_denda',
                    $bukti,
                    'public'
                );
        }

        $denda->update([

            'metode_pembayar' => $request->metode_bayar,

            'status_bayar' => 'sudah_bayar',

            'tanggal_bayar' => now(),

            'bukti_bayar' => $bukti

        ]);

        return back()
            ->with(
                'success',
                'Pembayaran denda berhasil'
            );
    }


    public function verifikasi($id)
    {
        $denda = ModelDenda::findOrFail($id);

        $denda->update([
            'status_bayar' => 'sudah_bayar'
        ]);

        return back()->with(
            'success',
            'Pembayaran berhasil diverifikasi'
        );
    }
    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $data = ModelDenda::findOrFail($id);

        $data->delete();

        return back()
            ->with(
                'success',
                'Data denda berhasil dihapus'
            );
    }
}
