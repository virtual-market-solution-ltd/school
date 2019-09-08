<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    public function schools(){
        return $this->belongsTo('App\School');
    }
}
