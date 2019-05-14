<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StuffPayment extends Model
{
    protected $table = 'stuff_payment';

    protected $fillable = ['date','position','stuff_name','note','amount'];

    
}