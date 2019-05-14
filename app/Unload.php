<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unload extends Model
{
    protected $table = 'unload';

    protected $fillable = ['date','year','round','current_chamber','chamber','radda','total_unload','rate_per_thousand','total_bill'];

    
}