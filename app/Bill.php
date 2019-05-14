<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = ['date','amount','month','cash_denomination','bill_type','payment_type','cheque_no','bill_user_input','year'];

    
}