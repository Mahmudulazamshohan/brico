<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    protected $table = 'land_lease';

    protected $fillable = ['landower_name','mobile','start','end','land_quantity','unit','amount','note','reminder_date','time'];

    
}
