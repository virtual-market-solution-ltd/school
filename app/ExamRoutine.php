<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamRoutine extends Model
{
    public function schools(){
        return $this->belongsTo('App\School');
    }

    public function school_classes(){
        return $this->belongsTo('App\SchoolClass');
    }

    public function school_sections(){
        return $this->belongsTo('App\SchoolSection');
    }

    public function school_subjects(){
        return $this->belongsTo('App\SchoolSubject');
    }
}
