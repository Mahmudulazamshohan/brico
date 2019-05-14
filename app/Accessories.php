<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $table = 'accessories';

    protected $fillable = ['date','stuff_type','stuff_name','accessories_type','quantity','waste'];

    
}