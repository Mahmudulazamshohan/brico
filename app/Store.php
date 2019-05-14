<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    protected $fillable = ['brick_id','stock_date','stock_list','quantity'];

    public function brick()
    {
        return $this->belongsTo('App\Brick');
    }
}
