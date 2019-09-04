<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'schools';
    //protected $primaryKey = 'school_id';

    protected $fillable = [
        'school_id',
        'school_name',
        'description'
    ];

}
