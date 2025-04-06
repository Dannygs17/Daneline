<?php

namespace App\Http\Requests;

use AllowDynamicProperties;
use App\Enums\DishCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

#[AllowDynamicProperties]
class UpdateDishRequest extends FormRequest {
	public function rules(): array {
		return [
			'name' => ['required', 'string', 'max:100'],
			'price' => ['required', 'decimal:2'],
			'picture' => ['nullable', 'file', 'image'],
			'category' => ['required', Rule::enum(DishCategory::class)],
		];
	}

	public function authorize(): bool {
		return true;
	}
}
