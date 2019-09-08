<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SchoolSection extends Model
{
    

    public function schools(){
        return $this->belongsTo('App\School');
    }

    public function school_classes(){
        return $this->belongsTo('App\SchoolClass');
    }
}
