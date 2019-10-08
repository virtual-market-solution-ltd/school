<?php

namespace App\HR;

use Illuminate\Database\Eloquent\Model;

class HRIncomeTaxSetup extends Model
{
    /**
     * rows [schools_id,st_amount,end_amount,rate,created_at,updated_at]
     */
    protected $table = 'hr_tax_setup';
}
