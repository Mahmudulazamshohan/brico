<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';

    protected $fillable = ['brick_id','quantity'];

    public function brick()
    {
        return $this->belongsTo('App\Brick');
    }

}
