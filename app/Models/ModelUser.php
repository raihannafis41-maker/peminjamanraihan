<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelUser extends Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [

        'nama',
        'username',
        'password',
        'role',
        'foto'

    ];

    protected $hidden = [

        'password'

    ];

    public function logactivity()
    {
        return $this->hasMany(
            ModelLogActivity::class,
            'user_id'
        );
    }
}