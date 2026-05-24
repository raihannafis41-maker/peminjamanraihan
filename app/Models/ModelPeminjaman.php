<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelPeminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjamans';

    protected $fillable = [
        'user_id',
        'alat_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(
            ModelUser::class,
            'user_id'
        );
    }

    public function alat()
    {
        return $this->belongsTo(
            ModelAlat::class,
            'alat_id'
        );
    }

    public function pengembalian()
    {
        return $this->hasOne(
            ModelPengembalian::class,
            'peminjaman_id'
        );
    }
}