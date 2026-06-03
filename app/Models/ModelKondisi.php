<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelKondisi extends Model
{
    use HasFactory;

    protected $table = 'kondisis';

    protected $fillable = [
        'nama_kondisi',
        'keterangan'
    ];
}