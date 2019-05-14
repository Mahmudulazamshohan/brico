<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProducedBy extends Model
{
    protected $table = 'raw_brick';

    protected $fillable = ['id','setup_date','mill_no','round_no','pot_no','even_no'];
    

}
