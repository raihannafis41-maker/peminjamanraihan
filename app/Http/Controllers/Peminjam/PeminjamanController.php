<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\ModelPeminjaman;
use App\Models\ModelAlat;
use App\Models\ModelPengembalian;
use App\Models\ModelDenda;

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
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'zonapeminjam.peminjaman.index',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | FORM PINJAM
    |--------------------------------------------------------------------------
    */

    public function create($id)
    {
        $alat = ModelAlat::findOrFail($id);

        if (
            $alat->status !== 'tersedia' ||
            $alat->stok_tersedia <= 0
        ) {
            return redirect()
                ->route('zonapeminjam.alat')
                ->with(
                    'error',
                    'Alat tidak tersedia untuk dipinjam.'
                );
        }

        return view(
            'zonapeminjam.peminjaman.create',
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
            'alat_id'           => 'required|exists:alats,id',
            'tanggal_pinjam'    => 'required|date',
            'tanggal_kembali'   => 'required|date|after:tanggal_pinjam',
            'jumlah'            => 'required|numeric|min:1',
            'catatan'           => 'nullable|string'
        ]);

        $alat = ModelAlat::findOrFail(
            $request->alat_id
        );

        if (
            $request->jumlah >
            $alat->stok_tersedia
        ) {
            return back()
                ->withInput()
                ->with(
                    'error',
                    'Jumlah melebihi stok tersedia.'
                );
        }

        ModelPeminjaman::create([

            'user_id' => Auth::id(),

            'alat_id' => $request->alat_id,

            'kode_peminjaman' =>
                'PJM-' .
                strtoupper(Str::random(8)),

            'tanggal_pinjam' =>
                $request->tanggal_pinjam,

            'tanggal_kembali' =>
                $request->tanggal_kembali,

            'jumlah' =>
                $request->jumlah,

            'catatan' =>
                $request->catatan,

            'status' => 'pending'
        ]);

        return redirect()
            ->route('zonapeminjam.status')
            ->with(
                'success',
                'Pengajuan peminjaman berhasil dikirim.'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DETAIL
    |--------------------------------------------------------------------------
    */

    public function show($id)
    {
        $data = ModelPeminjaman::with('alat')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        return view(
            'zonapeminjam.peminjaman.show',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | BATALKAN
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
            'Peminjaman berhasil dibatalkan.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS
    |--------------------------------------------------------------------------
    */

    public function status()
    {
        $data = ModelPeminjaman::with('alat')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view(
            'zonapeminjam.peminjaman.status',
            compact('data')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | KEMBALIKAN BARANG
    |--------------------------------------------------------------------------
    */

    public function kembalikan($id)
    {
        $peminjaman = ModelPeminjaman::with('alat')
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        if (
            $peminjaman->status != 'approved' &&
            $peminjaman->status != 'dipinjam'
        ) {
            return back()->with(
                'error',
                'Barang tidak dapat dikembalikan.'
            );
        }

        /*
        |--------------------------------------------------------------------------
        | HITUNG KETERLAMBATAN
        |--------------------------------------------------------------------------
        */

        $tanggalKembali = Carbon::parse(
            $peminjaman->tanggal_kembali
        );

        $hariIni = Carbon::now();

        $keterlambatan = 0;

        if ($hariIni->gt($tanggalKembali)) {

            $keterlambatan =
                $tanggalKembali->diffInDays($hariIni);
        }

        /*
        |--------------------------------------------------------------------------
        | HITUNG DENDA
        |--------------------------------------------------------------------------
        */

        $denda = $keterlambatan * 5000;

        /*
        |--------------------------------------------------------------------------
        | SIMPAN PENGEMBALIAN
        |--------------------------------------------------------------------------
        */

        $pengembalian = ModelPengembalian::create([

            'peminjaman_id'        => $peminjaman->id,

            'tanggal_pengembalian' => now(),

            'jumlah_kembali'       => $peminjaman->jumlah,

            'keterlambatan'        => $keterlambatan,

            'denda'                => $denda,

            'kondisi_kembali'      => 'baik',

            'catatan'              => 'Dikembalikan oleh peminjam'

        ]);

        /*
        |--------------------------------------------------------------------------
        | SIMPAN KE TABEL DENDA
        |--------------------------------------------------------------------------
        */

        if ($denda > 0) {

            ModelDenda::create([

                'pengembalian_id' =>
                    $pengembalian->id,

                'total_denda' =>
                    $denda,

                'status_bayar' =>
                    'belum_bayar'

            ]);
        }

        /*
        |--------------------------------------------------------------------------
        | KEMBALIKAN STOK ALAT
        |--------------------------------------------------------------------------
        */

        $alat = $peminjaman->alat;

        $alat->stok_tersedia =
            $alat->stok_tersedia +
            $peminjaman->jumlah;

        $alat->stok_dipinjam =
            max(
                0,
                $alat->stok_dipinjam -
                $peminjaman->jumlah
            );

        $alat->status = 'tersedia';

        $alat->save();

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS PEMINJAMAN
        |--------------------------------------------------------------------------
        */

        $peminjaman->update([

            'status' => 'dikembalikan'

        ]);

        return back()->with(
            'success',
            'Barang berhasil dikembalikan.'
        );
    }
}