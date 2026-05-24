<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Models\ModelPengembalian;
use App\Models\ModelPeminjaman;
use App\Models\ModelAlat;
use App\Models\ModelDenda;
use App\Models\ModelLogActivity;

class PengembalianController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelPengembalian::with([
                    'peminjaman.user',
                    'peminjaman.alat'
                ])
                ->latest()
                ->get();

        return view(
            'user.pengembalian.index',
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
        $peminjaman = ModelPeminjaman::with([
                            'user',
                            'alat'
                        ])
                        ->where('status', 'approved')
                        ->latest()
                        ->get();

        return view(
            'user.pengembalian.create',
            compact('peminjaman')
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

            'peminjaman_id'        => 'required',

            'tanggal_pengembalian' => 'required',

            'jumlah_kembali'       => 'required|numeric|min:1',

            'kondisi_kembali'      => 'required',

        ]);

        $peminjaman = ModelPeminjaman::findOrFail(
                            $request->peminjaman_id
                        );

        $alat = ModelAlat::findOrFail(
                    $peminjaman->alat_id
                );

        /*
        |--------------------------------------------------------------------------
        | HITUNG KETERLAMBATAN
        |--------------------------------------------------------------------------
        */

        $tanggalKembali = Carbon::parse(
            $peminjaman->tanggal_kembali
        );

        $tanggalPengembalian = Carbon::parse(
            $request->tanggal_pengembalian
        );

        $keterlambatan = 0;

        if ($tanggalPengembalian > $tanggalKembali) {

            $keterlambatan =
                $tanggalPengembalian->diffInDays(
                    $tanggalKembali
                );
        }

        /*
        |--------------------------------------------------------------------------
        | HITUNG DENDA
        |--------------------------------------------------------------------------
        */

        $denda = 0;

        if ($keterlambatan > 0) {

            $denda = $keterlambatan * 10000;
        }

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PENGEMBALIAN
        |--------------------------------------------------------------------------
        */

        $pengembalian = ModelPengembalian::create([

            'peminjaman_id'        => $request->peminjaman_id,

            'tanggal_pengembalian' =>
                $request->tanggal_pengembalian,

            'jumlah_kembali'       =>
                $request->jumlah_kembali,

            'keterlambatan'        =>
                $keterlambatan,

            'denda'                =>
                $denda,

            'kondisi_kembali'      =>
                $request->kondisi_kembali,

            'catatan'              =>
                $request->catatan,

        ]);

        /*
        |--------------------------------------------------------------------------
        | TAMBAH STOK KEMBALI
        |--------------------------------------------------------------------------
        */

        $alat->stok_tersedia =
            $alat->stok_tersedia +
            $request->jumlah_kembali;

        $alat->stok_dipinjam =
            $alat->stok_dipinjam -
            $request->jumlah_kembali;

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS ALAT
        |--------------------------------------------------------------------------
        */

        if ($alat->stok_tersedia > 0) {

            $alat->status = 'tersedia';
        }

        /*
        |--------------------------------------------------------------------------
        | JIKA KONDISI RUSAK
        |--------------------------------------------------------------------------
        */

        if (
            $request->kondisi_kembali == 'rusak'
        ) {

            $alat->status = 'rusak';
        }

        $alat->save();

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        $peminjaman->update([

            'status' => 'selesai'

        ]);

        /*
        |--------------------------------------------------------------------------
        | JIKA ADA DENDA
        |--------------------------------------------------------------------------
        */

        if ($denda > 0) {

            ModelDenda::create([

                'pengembalian_id' =>
                    $pengembalian->id,

                'total_denda' =>
                    $denda,

                'status_bayar' =>
                    'belum_bayar',

            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | LOG ACTIVITY
        |--------------------------------------------------------------------------
        */

        ModelLogActivity::create([

            'user_id' => Auth::id(),

            'aktivitas' =>
                'Melakukan pengembalian alat dengan kode : '
                . $peminjaman->kode_peminjaman

        ]);

        return redirect('/transaksi/pengembalian')
            ->with(
                'success',
                'Pengembalian berhasil dilakukan'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $data = ModelPengembalian::with([
                    'peminjaman.user',
                    'peminjaman.alat'
                ])
                ->findOrFail($id);

        return view(
            'user.pengembalian.show',
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
        $data = ModelPengembalian::findOrFail($id);

        $peminjaman = ModelPeminjaman::latest()->get();

        return view(
            'user.pengembalian.edit',
            compact(
                'data',
                'peminjaman'
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

            'tanggal_pengembalian' => 'required',

            'kondisi_kembali'      => 'required',

        ]);

        $data = ModelPengembalian::findOrFail($id);

        $data->update([

            'tanggal_pengembalian' =>
                $request->tanggal_pengembalian,

            'kondisi_kembali' =>
                $request->kondisi_kembali,

            'catatan' =>
                $request->catatan,

        ]);

        return redirect('/transaksi/pengembalian')
            ->with(
                'success',
                'Data pengembalian berhasil diupdate'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $data = ModelPengembalian::findOrFail($id);

        $data->delete();

        return back()
            ->with(
                'success',
                'Data pengembalian berhasil dihapus'
            );
    }
}