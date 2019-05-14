<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoalProducer extends Model
{
    protected $table = 'coal_producer';

    protected $fillable = ['produced_by', 'year','phone'];

    
}