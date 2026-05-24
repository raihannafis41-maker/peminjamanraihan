<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelSuratTeguran extends Model
{
    use HasFactory;

    /*
    |--------------------------------------------------------------------------
    | TABLE
    |--------------------------------------------------------------------------
    */

    protected $table = 'surat_teguran';

    /*
    |--------------------------------------------------------------------------
    | FILLABLE
    |--------------------------------------------------------------------------
    */

    protected $fillable = [

        'peminjaman_id',
        'user_id',
        'level_teguran',
        'isi_teguran',
        'tanggal_teguran',
        'status_baca',

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KE PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    public function peminjaman()
    {
        return $this->belongsTo(
            ModelPeminjaman::class,
            'peminjaman_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI KE USER
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(
            ModelUser::class,
            'user_id'
        );
    }
}