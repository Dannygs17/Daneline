<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title', 'Página sin título') | {{ config('app.name') }}</title>
	<!-- Styles / Scripts -->
	@vite('resources/js/app.js')
</head>
<body id="body">
<div class="d-flex justify-content-center align-items-center vw-100 vh-100">
	<div class="card mx-4 mx-md-0 w-50">
		<div class="row g-0">
			<div class="col-md-6">
				<img src="{{ asset('img/sections/auth-lateral.jpg') }}" class="img-fluid rounded-start rounded-end-4" alt="Imagen lateral">
			</div>
			<div class="col-md-6">
				<div class="card-body d-flex align-items-center justify-content-center h-100">
					@yield('card-content')
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>