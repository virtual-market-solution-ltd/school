<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Syllabus extends Model
{
    protected $table = 'syllabus';



    public function schools(){
        return $this->belongsTo('App\School');
    }
    public function school_classes(){
        return $this->belongsTo('App\SchoolClass');
    }
    public function school_subjects(){
        return $this->belongsTo('App\SchoolSubject');
    }
    public function exams(){
        return $this->belongsTo('App\Exams');
    }
}
