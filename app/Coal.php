<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coal extends Model
{
    protected $table = 'coal';

    protected $fillable = ['produced_by', 'rate_per_ton', 'import_country','year', 'killo', 'quantity','date','amount'];

    
}