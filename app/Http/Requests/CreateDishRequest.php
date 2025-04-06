<?php

namespace App\Http\Requests;

use App\Enums\DishCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateDishRequest extends FormRequest {
	public function rules(): array {
		return [
			'name' => ['required', 'string', 'max:100'],
			'price' => ['required', 'numeric', 'min_digits:2'],
			'picture' => ['required', 'file', 'image'],
			'category' => ['required', Rule::enum(DishCategory::class)],
		];
	}

	public function authorize(): bool {
		return true;
	}
}
