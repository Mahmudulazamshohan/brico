<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    protected $table = 'stuff';

    protected $fillable = ['name','address','position','mobile','join_date','salary','avater_file_name','stuff_id'];

    
}