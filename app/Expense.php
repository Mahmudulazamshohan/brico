<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';
    protected $fillable = ['reason','note','currency_id','amount','created_id','created_by'];

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }
}
