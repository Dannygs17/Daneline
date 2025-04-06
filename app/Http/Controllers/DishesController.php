<?php

namespace App\Http\Controllers;

use App\Enums\DishCategory;
use App\Http\Requests\CreateDishRequest;
use App\Http\Requests\UpdateDishRequest;
use App\Models\Dish;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use function back;
use function str;

class DishesController extends Controller {
	public function getDishesByCategory(DishCategory $category): View {
		$query = Dish::query();

		return view('pages.dishes.index')->with([
			'dishes' => $query->whereCategory($category->value)->paginate(3),
			'category' => $category,
		]);
	}

	public function storeDish(CreateDishRequest $request): RedirectResponse {
		$dish = new Dish([
			
			'name' => $request->name,
			'price' => $request->price,
		]);

		$dish->category = $request->category;

		$path = $request->file('picture')->store('dishes', 'public');

		$dish->picture = $path;

		$dish->save();

		return Redirect::route('dishes.get-by-category', ['category' => $request->category])->with('success', 'Platillo registrado correctamente.');
	}

	public function updateDish(UpdateDishRequest $request, Dish $dish): RedirectResponse {
		$dish->name = $request->name;
		$dish->price = $request->price;

		if ($request->file('picture') != null) {
			Storage::disk('public')->delete($dish->picture);

			$path = $request->file('picture')->store('dishes', 'public');
			
			$dish->picture = $path;
		}
		
		if ($dish->isClean()) {
			return back()->withErrors(['form' => 'No se han hecho cambios todavía.']);
		}
		
		$dish->save();

		return Redirect::route('dishes.get-by-category', ['category' => $request->category])->with('success', 'Platillo actualizado correctamente.');
	}

	public function deleteDish(Dish $dish): RedirectResponse {
		Storage::disk('public')->delete($dish->picture);
		
		$dish->delete();

		return back()->with('success', 'Platillo eliminado correctamente.');
	}


	public function create(): View
{
    return view('pages.dishes.create', [
        'category' => request()->query('category') // Lee el valor desde la URL
    ]);
}
}
