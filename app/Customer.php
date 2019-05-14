<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = ['name','email','address','phone','identifier_name','identifier_mobile_no','invoice_id','date'];

    public function invoice()
    {
        return $this->belongsTo('App\Invoice');
    }
    public function brick()
    {
        return $this->belongsTo('App\Brick');
    }


}
