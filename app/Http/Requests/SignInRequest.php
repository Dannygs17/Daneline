<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignInRequest extends FormRequest {
	public function rules(): array {
		return [
			'username' => ['required', 'string'],
			'password' => ['required'],
			'remember' => ['nullable', 'boolean'],
		];
	}

	public function authorize(): bool {
		return true;
	}
}
