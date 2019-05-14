<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laser extends Model
{
    protected $table = 'customer_order';

    protected $fillable = ['id','customer_id','payment_date','transport','product_type','product_quantity','product_rate','subtotal'];
    

}
