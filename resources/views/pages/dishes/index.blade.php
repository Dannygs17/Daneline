@extends('layouts.app')

@section('title', 'Platillos')

@section('main-content')
	<div class="card w-75 bg-secondary text-white">
		<div class="card-body text-center p-5">
			<div class="row justify-content-end">
				<div class="col-4 text-end">
					<a href="{{ route('dishes.create', $category) }}" class="btn btn-primary"><i class="bi bi-plus-circle"></i> Agregar platillo</a>
					<a href="{{ route('dishes.categories') }}" class="btn btn-outline-dark">Volver</a>
				</div>
				<div class="col-12">
					<x-alert/>
				</div>
				<div class="col-12 mt-4 mb-3">
					<div class="row justify-content-center">
						@forelse($dishes as $dish)
							<div class="col-3 g-4">
								<div class="card">
									<div class="card-body d-flex flex-column align-items-center">
										<div id="dish-img" class="d-block rounded mb-2" style="background-image: url({{ asset('storage/' . $dish->picture) }})"></div>
										<span class="fs-3 fw-light">{{ $dish->name }}</span>
										<span class="fs-5 fw-light">${{ $dish->price }}</span>
										<a href="{{ route('dishes.edit', $dish->id) }}" class="fs-5 fw-light text-success text-decoration-none">
											<i class="bi bi-pencil-square"></i> Editar
										</a>
										<button type="button" class="btn fs-5 fw-light text-danger" data-bs-toggle="modal" data-bs-target="#delete-dish-{{ $dish->id }}">
											<i class="bi bi-pencil-square"></i>
											Eliminar
										</button>
										<div class="modal fade" id="delete-dish-{{ $dish->id }}" tabindex="-1" aria-labelledby="delete-dish-{{ $dish->id }}" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar platillo</h1>
														<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
													</div>
													<div class="modal-body text-start">
														¿Está seguro de que desea eliminar el platillo llamado {{ $dish->name }}?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
														<button form="delete_dish_{{ $dish->id }}_form" type="submit" class="btn btn-danger">Eliminar</button>
													</div>
												</div>
												<form id="delete_dish_{{ $dish->id }}_form" method="post" action="{{ route('dishes.destroy', $dish->id) }}" class="invisible">
													@csrf
													@method('DELETE')
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						@empty
							<div class="alert alert-dark mt-3" role="alert">
								Aún no hay platillos de esta categoría
							</div>
						@endforelse
					</div>
				</div>
				{{ $dishes->links() }}
			</div>
		</div>
	</div>
@endsection