<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelPeminjam extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'nama',
        'username',
        'password',
        'role'
    ];

    protected $hidden = [
        'password'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    public function peminjaman()
    {
        return $this->hasMany(ModelPeminjaman::class, 'user_id');
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
