@extends('layouts.app')

@section('title', 'Editar platillo')

@section('main-content')
	<div class="card w-25">
		<div class="card-body p-5">
			<form method="post" action="{{ route('dishes.update', $dish->id) }}" enctype="multipart/form-data">
				@csrf
				@method('PUT')

				<div class="mb-3">
					<label for="name" class="form-label mb-1">Nombre del platillo</label>
					<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $dish->name) }}" autocomplete="off" autofocus>
					@error('name')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div class="mb-3">
					<label for="price" class="form-label mb-1">Precio del platillo</label>
					<input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $dish->price) }}" autocomplete="off">
					@error('price')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div class="mb-3">
					<label for="picture" class="form-label mb-1">Foto del platillo</label>
					<input type="file" class="form-control @error('picture') is-invalid @enderror" id="picture" name="picture">
					@error('picture')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				<div class="mb-3">
					<label for="category" class="form-label mb-1">Categoría</label>
					<select name="category" id="category" class="form-select @error('category') is-invalid @enderror">
						@foreach(\App\Enums\DishCategory::cases() as $cat)
							<option value="{{ $cat->value }}"
								@selected(old('category', $dish->category) == $cat->value)>
								{{ ucfirst(str_replace('_', ' ', $cat->value)) }}
							</option>
						@endforeach
					</select>
					@error('category')
					<div class="invalid-feedback">{{ $message }}</div>
					@enderror
				</div>

				@error('form') <x-form-error/> @enderror

				<div class="d-grid gap-2">
					<button type="submit" class="btn btn-primary">Guardar cambios</button>
					<a href="{{ route('dishes.get-by-category', $dish->category) }}" class="btn btn-outline-secondary">Cancelar</a>
				</div>
			</form>
		</div>
	</div>
@endsection
