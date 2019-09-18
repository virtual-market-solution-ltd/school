<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChartClass extends Model {
	protected $table = 'chart_class';
	protected $primaryKey = 'cid';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		//'classtype' => 'bool',
		'inactive' => 'bool'
	];

	protected $fillable = [
		'class_name',
		'class_type',
		'inactive'
	];
}
