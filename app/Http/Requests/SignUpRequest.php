<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class SignUpRequest extends FormRequest {
	public function rules(): array {
		return [
			'first_name' => ['required', 'string', 'max:100'],
			'last_name' => ['required', 'string', 'max:100'],
			'username' => ['required', 'string', 'max:35', 'unique:users,username'],
			'email' => ['required', 'email:rfc,dns', 'max:254', 'unique:users,email'],
			'password' => ['required', 'string','max:100'],
			'password_confirmation' => ['required', 'same:password'],
		];
	}

	public function authorize(): bool {
		return true;
	}
}
