<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prices extends Model {
	protected $table = 'prices';
	protected $primaryKey = 'id';
	public $timestamps = false;

	protected $casts = [
		'sales_type_id' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'stock_id',
		'sales_type_id',
		'curr_abrev',
		'price'
	];

	public function type() {
		return $this->hasOne(SalesType::class, 'id', 'sales_type_id');
	}
}
