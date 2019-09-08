<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    

    
    public function schools(){
        return $this->belongsTo('App\School');
    }

    public function teacher() {
        return $this->belongsTo('App\User', 'teachers_id');
    }

    public function student() { 
        return $this->belongsTo('App\User', 'students_id');
    }

    public function school_classes(){
        return $this->belongsTo('App\SchoolClass');
    }

    public function school_sections(){
        return $this->belongsTo('App\SchoolSection');
    }
}
