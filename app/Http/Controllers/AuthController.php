<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Auth;
use Illuminate\Http\RedirectResponse;
use Redirect;
use Session;
use function __;
use function route;

class AuthController extends Controller {
	public function signIn(SignInRequest $request): RedirectResponse {
		if (Auth::attempt($request->only(['username', 'password'], $request->safe()->boolean('remember')))) {
			$request->session()->regenerate();

			return Redirect::intended(route('home'));
		}

		return Redirect::back()->withErrors([
			'form' => __('auth.failed'),
		])->withInput();
	}

	public function signUp(SignUpRequest $request): RedirectResponse {
		User::create($request->safe()->except('password_confirmation'));

		return Redirect::route('auth.sign-in');
	}
	
	public function signOut(): RedirectResponse {
		Auth::logout();
		
		Session::invalidate();
		Session::regenerateToken();
		
		return Redirect::route('auth.sign-in');
	}
}
