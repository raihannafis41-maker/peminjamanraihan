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
        'approval_by',
        'kode_peminjaman',
        'tanggal_pinjam',
        'tanggal_kembali',
        'jumlah',
        'catatan',
        'status'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI USER PEMINJAM
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(
            ModelUser::class,
            'user_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI ALAT
    |--------------------------------------------------------------------------
    */

    public function alat()
    {
        return $this->belongsTo(
            ModelAlat::class,
            'alat_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI PETUGAS / ADMIN YANG MENYETUJUI
    |--------------------------------------------------------------------------
    */

    public function approver()
    {
        return $this->belongsTo(
            ModelUser::class,
            'approval_by'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RELASI PENGEMBALIAN
    |--------------------------------------------------------------------------
    */

    public function pengembalian()
    {
        return $this->hasOne(
            ModelPengembalian::class,
            'peminjaman_id'
        );
    }
}
