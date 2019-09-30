<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamResult extends Model
{
    protected $table = 'exam_results';


    
    public function schools(){
        return $this->belongsTo('App\School');
    }
    public function users(){
        return $this->belongsTo('App\School');
    }
    public function classes(){
        return $this->belongsTo('App\SchoolClass');
    }
    public function sections(){
        return $this->belongsTo('App\SchoolSection');
    }
    public function subjects(){
        return $this->belongsTo('App\SchoolSubject');
    }
    public function exams(){
        return $this->belongsTo('App\Exams');
    }

}
