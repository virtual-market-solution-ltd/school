<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }

    public function schools(){
        return $this->belongsTo('App\SchoolSchool');
    }
    public function school_classes(){
        return $this->belongsTo('App\SchoolClass');
    }
    public function school_sections(){
        return $this->belongsTo('App\SchoolSection');
    }
}
