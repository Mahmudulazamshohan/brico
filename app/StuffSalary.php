<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StuffSalary extends Model
{
    protected $table = 'stuff_salary';

    protected $fillable = ['date','position','stuff_id','payment_type','current_month','amount'];

    
}