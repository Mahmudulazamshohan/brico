<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $table = 'general_settings';
    protected $fillable =['title','logo','address','email','number','facebook','mission','vision','twitter','google_plus','linkedin','youtube','footer_text'];
}
