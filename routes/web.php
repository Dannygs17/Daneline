<?php

use App\Enums\DishCategory;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DishesController;
use App\Models\Dish;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
	Route::view('/', 'pages.auth.sign-in')->name('index');
	Route::view('/sign-in', 'pages.auth.sign-in')->name('auth.sign-in');
	Route::view('/sign-up', 'pages.auth.sign-up')->name('auth.sign-up');

	Route::post('/sign-in', [AuthController::class, 'signIn'])->name('login');
	Route::post('/sign-up', [AuthController::class, 'signUp'])->name('register');

	Route::view('/forgot-password', 'pages.auth.password.request-email')->name('password.request');
	// Route::view('/forgot-password', 'pages.auth.password.request-email')->name('password.email');
	Route::view('/reset-password', 'pages.auth.password.reset-password')->name('password.reset');
	// Route::view('/reset-password', 'pages.auth.password.reset-password')->name('password.update');
});

Route::middleware('auth')->group(function () {
	Route::post('/sign-out', [AuthController::class, 'signOut'])->name('logout');

	Route::view('/home', 'pages.home')->name('home');

	Route::prefix('/menu')->group(function () {
		Route::view('', 'pages.dishes.categories')->name('dishes.categories');
		Route::view('/index/{category}', 'pages.dishes.index')->name('dishes.index');
		Route::get('/create/{category}', function (DishCategory $category) {
			return view('pages.dishes.create', compact('category'));
		})->name('dishes.create');
		Route::get('/update/{dish}', function (Dish $dish) {
			return view('pages.dishes.edit', compact('dish'));
		})->name('dishes.edit');
	});

	Route::get('/get-dishes/{category}', [DishesController::class, 'getDishesByCategory'])->name('dishes.get-by-category');
	Route::post('/store-dish', [DishesController::class, 'storeDish'])->name('dishes.store');
	Route::put('/update-dish/{dish}', [DishesController::class, 'updateDish'])->name('dishes.update');
	Route::delete('/delete-dish/{dish}', [DishesController::class, 'deleteDish'])->name('dishes.destroy');
});
