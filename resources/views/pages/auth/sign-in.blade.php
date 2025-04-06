@extends('layouts.auth')

@section('title', 'Inicio de sesión')

@section('card-content')
	<div class="d-flex flex-column">
		<img src="{{ asset('img/app-logo.png') }}" class="mx-auto" alt="Logo de la app">
		<form method="post" action="{{ route('login') }}" class="px-4">
			@csrf
			<div class="mb-3">
				<label for="username" class="form-label mb-1">Nombre de usuario</label>
				<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" autocomplete="off" autofocus    >
				@error('username')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
			<div class="mb-1">
				<label for="password" class="form-label mb-1">Contraseña</label>
				<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off">
				@error('password')
				<div class="invalid-feedback">
					{{ $message }}
				</div>
				@enderror
			</div>
			<a href="{{ route('password.request') }}" class="link-underline-primary link-opacity-75-hover mb-3 d-block">
				¿Olvidaste tu contraseña?
			</a>
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
				<label class="form-check-label" for="remember_me">Recordarme en este navegador</label>
			</div>
			@error('form') <x-form-error/> @enderror
			<div class="d-grid gap-2">
				<button type="submit" class="btn btn-primary">Iniciar sesión</button>
				<a href="{{ route('auth.sign-up') }}" class="link-secondary link-underline-secondary link-opacity-75-hover mb-3 d-block">
					¿Aún no tienes cuenta? Regístrate ahora
				</a>
			</div>
		</form>
	</div>
@endsection