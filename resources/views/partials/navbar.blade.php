<nav class="navbar sticky-top navbar-expand-lg bg-primary" data-bs-theme="dark">
	<div class="container-md">
		<a class="navbar-brand" href="{{ route('home') }}">
			<img src="{{ asset('img/app-logo.png') }}" alt="Logo" height="24" class="d-inline-block align-text-top">
			Daneline
		</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link @if(request()->routeIs('home')) active @endif" aria-current="page" href="{{ route('home') }}">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link @if(request()->routeIs('dishes.*')) active @endif" href="{{ route('dishes.categories') }}">Menú</a>
				</li>
				{{--<li class="nav-item">
					<a class="nav-link" href="#">Contacto</a>
				</li>--}}
				{{--<li class="nav-item">
					<a class="nav-link disabled" aria-disabled="true">Disabled</a>
				</li>--}}
			</ul>
			<div class="dropdown">
				<button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
					{{ str(auth()->user()->first_name)->append(" ", auth()->user()->last_name) }}
				</button>
				<ul class="dropdown-menu dropdown-menu-end">
					<li><button form="logout_form" type="submit" class="dropdown-item">Cerrar sesión</button></li>
				</ul>
			</div>
		</div>
	</div>
	
	<form id="logout_form" method="post" action="{{ route('logout') }}" class="invisible">
		@csrf
	</form>
</nav>