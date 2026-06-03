<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelPeminjaman;
use App\Models\ModelAlat;
use App\Models\ModelLogActivity;

class ApprovalController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN APPROVAL
    |--------------------------------------------------------------------------
    */

    public function approval($id)
    {
        $data = ModelPeminjaman::with([
            'user',
            'alat'
        ])->findOrFail($id);

        return view(
            'user.peminjaman.approval',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PROSES APPROVAL
    |--------------------------------------------------------------------------
    */

    public function approvalProses(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected'
        ]);

        $data = ModelPeminjaman::findOrFail($id);

        $alat = ModelAlat::findOrFail(
            $data->alat_id
        );

        /*
        |--------------------------------------------------------------------------
        | APPROVED
        |--------------------------------------------------------------------------
        */

        if ($request->status == 'approved') {

            if ($alat->stok < $data->jumlah) {

                return back()->with(
                    'error',
                    'Stok alat tidak mencukupi'
                );
            }

            $alat->stok =
                $alat->stok - $data->jumlah;

            if ($alat->stok <= 0) {

                $alat->status = 'habis';

            } else {

                $alat->status = 'tersedia';
            }

            $alat->save();

            $data->update([

                'status'      => 'approved',

                'approval_by' => Auth::id(),

            ]);

            ModelLogActivity::create([

                'user_id' => Auth::id(),

                'aktivitas' =>
                    'Menyetujui peminjaman dengan kode : '
                    . $data->kode_peminjaman

            ]);

            return redirect('/transaksi/peminjaman')
                ->with(
                    'success',
                    'Peminjaman berhasil disetujui'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | REJECTED
        |--------------------------------------------------------------------------
        */

        $data->update([

            'status'      => 'rejected',

            'approval_by' => Auth::id(),

        ]);

        ModelLogActivity::create([

            'user_id' => Auth::id(),

            'aktivitas' =>
                'Menolak peminjaman dengan kode : '
                . $data->kode_peminjaman

        ]);

        return redirect('/transaksi/peminjaman')
            ->with(
                'success',
                'Peminjaman berhasil ditolak'
            );
    }
}