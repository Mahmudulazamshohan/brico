<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = ['customer_id','brick_id','quantity','created_date','pay_date','paid_by','paid_id'];

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
    public function brick()
    {
        return $this->belongsTo('App\Brick');
    }

}
