<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelAlat extends Model
{
    use HasFactory;

    protected $table = 'alats';

    protected $fillable = [

        'kategori_id',
        'kondisi_id',
        'kode_alat',
        'nama_alat',
        'stok',
        'stok_tersedia',
        'stok_dipinjam',
        'lokasi',
        'deskripsi',
        'foto',
        'status'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KATEGORI
    |--------------------------------------------------------------------------
    */

    public function kategori()
    {
        return $this->belongsTo(
            ModelKategori::class,
            'kategori_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI KONDISI
    |--------------------------------------------------------------------------
    */

    public function kondisi()
    {
        return $this->belongsTo(
            ModelKondisi::class,
            'kondisi_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI PEMINJAMAN
    |--------------------------------------------------------------------------
    */

    public function peminjaman()
    {
        return $this->hasMany(
            ModelPeminjaman::class,
            'alat_id'
        );
    }
}