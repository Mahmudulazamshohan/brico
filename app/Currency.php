<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currencies';
    protected $fillable = ['name','rate'];

    public function brick()
    {
        return $this->hasMany('App\Brick');
    }
    public function sell()
    {
        return $this->hasMany('App\Sell');
    }
    public function expense()
    {
        return $this->hasMany('App\Expense');
    }
    public function laborers()
    {
        return $this->hasMany('App\Laborer');
    }
    public function lenders()
    {
        return $this->hasMany('App\Lender');
    }


}
