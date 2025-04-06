<?php

namespace App\Models;

use App\Enums\DishCategory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model {
	protected $fillable = [
		'name',
		'price',
		'picture',
		'category',
	];

	protected function casts(): array {
		return [
			'category' => DishCategory::class,
		];
	}
}
