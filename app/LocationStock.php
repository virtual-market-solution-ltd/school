<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationStock extends Model {
	protected $table = 'loc_stock';
	protected $primaryKey = 'loc_code';
}
