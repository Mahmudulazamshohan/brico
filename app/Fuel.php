<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    protected $table = 'fuel_bill';

    protected $fillable = ['date','selection','fuel_type','transport_type','litre','amount','year','total_amount'];

    
}
