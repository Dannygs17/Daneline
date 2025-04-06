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
@include('partials.navbar')
<main id="main-content" class="d-flex justify-content-center align-items-center">
	@yield('main-content')
</main>
</body>
</html>