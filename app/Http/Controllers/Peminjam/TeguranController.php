<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\ModelSuratTeguran;

class TeguranController extends Controller
{
    public function index()
    {
        $data = ModelSuratTeguran::where(
                    'user_id',
                    Auth::id()
                )
                ->latest()
                ->get();

        return view(
            'zonaPeminjam.teguran.index',
            compact('data')
        );
    }

    public function show($id)
    {
        $data = ModelSuratTeguran::where(
                    'user_id',
                    Auth::id()
                )
                ->findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | UPDATE STATUS BACA
        |--------------------------------------------------------------------------
        */

        $data->update([

            'status_baca' => 'sudah_dibaca'

        ]);

        return view(
            'zonaPeminjam.teguran.show',
            compact('data')
        );
    }
}