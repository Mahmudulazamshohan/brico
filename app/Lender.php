<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lender extends Model
{
    protected $table = 'lenders';

    protected $fillable = ['name','email','phone','address','brick_id','brick_quantity','currency_id','amount','created_date','delivery_date','status'];

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }
    public function brick()
    {
        return $this->belongsTo('App\Brick');
    }
}
