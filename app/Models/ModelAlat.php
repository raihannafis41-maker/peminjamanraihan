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
        'nama_alat',
        'stok',
        'kondisi',
        'foto',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    public function kategori()
    {
        return $this->belongsTo(
            ModelKategori::class,
            'kategori_id'
        );
    }

    public function peminjaman()
    {
        return $this->hasMany(
            ModelPeminjaman::class,
            'alat_id'
        );
    }
}