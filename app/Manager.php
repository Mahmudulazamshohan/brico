<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='manager_account';
    protected $fillable = [
        'name', 'username','email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
