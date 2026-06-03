<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelDenda extends Model
{
    use HasFactory;

    protected $table = 'dendas';

    protected $fillable = [

        'pengembalian_id',
        'total_denda',
        'status_bayar'

    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI KE PENGEMBALIAN
    |--------------------------------------------------------------------------
    */

    public function pengembalian()
    {
        return $this->belongsTo(
            ModelPengembalian::class,
            'pengembalian_id'
        );
    }
}