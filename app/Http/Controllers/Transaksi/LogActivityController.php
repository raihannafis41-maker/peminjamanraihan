<?php

namespace App\Http\Controllers\Transaksi;

use App\Http\Controllers\Controller;

use App\Models\ModelLogActivity;

class LogActivityController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $data = ModelLogActivity::with('user')
                ->latest()
                ->get();

        return view(
            'user.logactivity.index',
            compact('data')
        );
    }
}