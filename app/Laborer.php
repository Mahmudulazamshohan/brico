<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laborer extends Model
{
    protected $table = 'laborers';

    protected $fillable = ['name','email','phone','currency_id','salary','code'];

    public function currency()
    {
        return $this->belongsTo('App\Currency');
    }

    public function salaries()
    {
        return $this->hasMany('App\Salary');
    }
}
