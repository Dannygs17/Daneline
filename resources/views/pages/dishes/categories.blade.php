@php use App\Enums\DishCategory; @endphp
@extends('layouts.app')

@section('title', 'Menú')

@section('main-content')
	<div class="card w-75">
		<div class="card-body text-center p-5">
			<h5 class="fs-1 fw-bold mb-0">Menú</h5>
			<div class="container mx-auto mt-4">
				<div class="row justify-content-center g-5">
					<div class="col-3">
						<a href="{{ route('dishes.get-by-category', ['category' => DishCategory::APPETIZER]) }}" class="card bg-secondary text-decoration-none">
							<div class="card-body d-flex flex-column align-items-center">
								<div id="appetizer-img" class="d-block rounded-circle mb-2"></div>
								<span class="fs-3 fw-light text-white">Entradas</span>
							</div>
						</a>
					</div>
					<div class="col-3">
						<a href="{{ route('dishes.get-by-category', ['category' => DishCategory::MAIN_COURSE]) }}" class="card bg-secondary text-decoration-none">
							<div class="card-body d-flex flex-column align-items-center">
								<div id="main-course-img" class="d-block rounded-circle mb-2"></div>
								<span class="fs-3 fw-light text-white">Platos fuertes</span>
							</div>
						</a>
					</div>
					<div class="col-3">
						<a href="{{ route('dishes.get-by-category', ['category' => DishCategory::SOUP]) }}" class="card bg-secondary text-decoration-none">
							<div class="card-body d-flex flex-column align-items-center">
								<div id="soup-img" class="d-block rounded-circle mb-2"></div>
								<span class="fs-3 fw-light text-white">Sopas y caldos</span>
							</div>
						</a>
					</div>
				</div>
				<div class="row justify-content-center g-5 mt-0">
					<div class="col-3">
						<a href="{{ route('dishes.get-by-category', ['category' => DishCategory::GARNISH]) }}" class="card bg-secondary text-decoration-none">
							<div class="card-body d-flex flex-column align-items-center">
								<div id="garnish-img" class="d-block rounded-circle mb-2"></div>
								<span class="fs-3 fw-light text-white">Guarniciones</span>
							</div>
						</a>
					</div>
					<div class="col-3">
						<a href="{{ route('dishes.get-by-category', ['category' => DishCategory::DRINK]) }}" class="card bg-secondary text-decoration-none">
							<div class="card-body d-flex flex-column align-items-center">
								<div id="drink-img" class="d-block rounded-circle mb-2"></div>
								<span class="fs-3 fw-light text-white">Bebidas</span>
							</div>
						</a>
					</div>
					<div class="col-3">
						<a href="{{ route('dishes.get-by-category', ['category' => DishCategory::DESSERT]) }}" class="card bg-secondary text-decoration-none">
							<div class="card-body d-flex flex-column align-items-center">
								<div id="dessert-img" class="d-block rounded-circle mb-2"></div>
								<span class="fs-3 fw-light text-white">Postres</span>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection