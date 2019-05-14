<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'customer_payment_received';

    protected $fillable = ['id','customer_id','cheque_or_cash','cheque_no','payment_amount','payment_date'];

    
}
