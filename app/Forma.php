<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Forma extends Model
{
    protected $table = 'forma';

    protected $fillable = ['date','supplier','address', 'mobile','rate','quantity','distance','width','height','note'];

    
}