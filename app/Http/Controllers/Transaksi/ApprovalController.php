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
                ])
                ->findOrFail($id);

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

            'status' => 'required'

        ]);

        $data = ModelPeminjaman::findOrFail($id);

        $alat = ModelAlat::findOrFail(
                    $data->alat_id
                );

        /*
        |--------------------------------------------------------------------------
        | JIKA APPROVED
        |--------------------------------------------------------------------------
        */

        if ($request->status == 'approved') {

            /*
            |--------------------------------------------------------------------------
            | CEK STOK
            |--------------------------------------------------------------------------
            */

            if (
                $alat->stok_tersedia <
                $data->jumlah
            ) {

                return back()->with(
                    'error',
                    'Stok alat tidak mencukupi'
                );
            }

            /*
            |--------------------------------------------------------------------------
            | KURANGI STOK
            |--------------------------------------------------------------------------
            */

            $alat->stok_tersedia =
                $alat->stok_tersedia -
                $data->jumlah;

            $alat->stok_dipinjam =
                $alat->stok_dipinjam +
                $data->jumlah;

            /*
            |--------------------------------------------------------------------------
            | UPDATE STATUS ALAT
            |--------------------------------------------------------------------------
            */

            if ($alat->stok_tersedia <= 0) {

                $alat->status = 'habis';

            } else {

                $alat->status = 'dipinjam';
            }

            $alat->save();

            /*
            |--------------------------------------------------------------------------
            | UPDATE STATUS PEMINJAMAN
            |--------------------------------------------------------------------------
            */

            $data->update([

                'status'      => 'approved',

                'approval_by' => Auth::id(),

            ]);

            /*
            |--------------------------------------------------------------------------
            | LOG ACTIVITY
            |--------------------------------------------------------------------------
            */

            ModelLogActivity::create([

                'user_id'   => Auth::id(),

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
        | JIKA REJECTED
        |--------------------------------------------------------------------------
        */

        if ($request->status == 'rejected') {

            $data->update([

                'status'      => 'rejected',

                'approval_by' => Auth::id(),

            ]);

            /*
            |--------------------------------------------------------------------------
            | LOG ACTIVITY
            |--------------------------------------------------------------------------
            */

            ModelLogActivity::create([

                'user_id'   => Auth::id(),

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

        return back()->with(
            'error',
            'Terjadi kesalahan'
        );
    }
}