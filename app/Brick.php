<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brick extends Model
{
    protected $table = 'bricks';

    protected $fillable = ['name','currency_id','rate'];

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }
    public function stock()
    {
        return $this->belongsTo('App\Stock');
    }
    public function stockInvoice()
    {
        return $this->belongsTo('App\StockInvoice');
    }
    public function invoice()
    {
        return $this->hasMany('App\Invoice');
    }
    public function customer()
    {
        return $this->hasMany('App\Customer');
    }
    public function lenders()
    {
        return $this->hasMany('App\Lender');
    }
}
