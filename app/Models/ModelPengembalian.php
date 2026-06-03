<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelPengembalian extends Model
{
    use HasFactory;

    protected $table = 'pengembalians';

    protected $fillable = [

        'peminjaman_id',
        'tanggal_pengembalian',
        'jumlah_kembali',
        'keterlambatan',
        'denda',
        'kondisi_kembali',
        'catatan'

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
    | RELASI KE ALAT (MELALUI PEMINJAMAN)
    |--------------------------------------------------------------------------
    */

    public function alat()
    {
        return $this->hasOneThrough(
            ModelAlat::class,
            ModelPeminjaman::class,
            'id',
            'id',
            'peminjaman_id',
            'alat_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI KE DENDA
    |--------------------------------------------------------------------------
    */

    public function denda()
    {
        return $this->hasOne(
            ModelDenda::class,
            'pengembalian_id'
        );
    }
}