<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'delivery';

    protected $fillable = ['date','year','customer_id','product_type','quantity','stock_id','transport_type','transport_bill'];

    
}
