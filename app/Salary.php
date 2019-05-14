<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    protected $table = 'salaries';

    protected $fillable = ['laborer_id','salary_date','status'];

    public function laborer()
    {
        return $this->belongsTo('App\Laborer');
    }
}
