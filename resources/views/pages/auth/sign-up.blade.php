@extends('layouts.auth')

@section('title', 'Registro')

@section('card-content')
	<div class="d-flex flex-column">
		<img src="{{ asset('img/app-logo.png') }}" class="mx-auto" alt="Logo de la app">
		<form method="post" action="{{ route('register') }}" class="px-4">
			@csrf
			<div class="row g-3 mb-3">
				<div class="col-6">
					<label for="first_name" class="form-label mb-1">Nombre(s)</label>
					<input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}" autocomplete="off" autofocus>
					@error('first_name')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
				<div class="col-6">
					<label for="last_name" class="form-label mb-1">Apellido(s)</label>
					<input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}" autocomplete="off">
					@error('last_name')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
				<div class="col-6">
					<label for="email" class="form-label mb-1">Correo electrónico</label>
					<input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" autocomplete="off">
					@error('email')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
				<div class="col-6">
					<label for="username" class="form-label mb-1">Nombre de usuario</label>
					<input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" autocomplete="off">
					@error('username')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
				<div class="col-6">
					<label for="password" class="form-label mb-1">Contraseña</label>
					<input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" autocomplete="off">
					@error('password')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
				<div class="col-6">
					<label for="password_confirmation" class="form-label mb-1">Confirmar contraseña</label>
					<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" autocomplete="off">
					@error('password_confirmation')
					<div class="invalid-feedback">
						{{ $message }}
					</div>
					@enderror
				</div>
			</div>
			<div class="d-grid gap-2">
				<button type="submit" class="btn btn-primary">Registrarse</button>
				<a href="{{ route('auth.sign-in') }}" class="link-secondary link-underline-secondary link-opacity-75-hover mb-3 d-block text-center">
					¿Ya tienes una cuenta? Inicia sesión ahora
				</a>
			</div>
		</form>
	</div>
@endsection