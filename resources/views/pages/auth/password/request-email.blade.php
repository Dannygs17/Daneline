@extends('layouts.auth')

@section('title', 'Recuperación de contraseña')

@section('card-content')
	<div class="d-flex flex-column">
		<img src="{{ asset('img/app-logo.png') }}" class="mx-auto" alt="Logo de la app">
		<form class="mt-3">
			<div class="mb-3">
				<label for="email" class="form-label mb-1">Correo electrónico</label>
				<input type="email" class="form-control" id="email" autocomplete="off">
			</div>
			<div class="d-grid gap-2">
				<button type="submit" class="btn btn-primary">Registrarse</button>
				<button type="submit" class="btn btn-outline-secondary">Iniciar sesión</button>
			</div>
		</form>
	</div>
@endsection