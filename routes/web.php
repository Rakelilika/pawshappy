<?php

use App\Http\Controllers\CarerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\StayController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
	return view('welcome');
})->name('welcome');

Route::get('/politica-privacidad', function () {
	return view('privacidad');
})->name('privacidad');

//Solo podemos acceder a esta ruta cuando estemos logueados y verificados
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

//Solo podemos acceder a estas rutas cuando estemos logueados y verificados
Route::middleware(['auth', 'verified'])->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
	Route::post('/profile={user}&cuidador={cuidador}', [ProfileController::class, 'store'])->name('profile.store');
	Route::get('/profile={user}', [CarerController::class, 'cuidador'])->name('profile.cuidador');
	Route::get('/pet', [PetController::class, 'list'])->name('pet.list');
	Route::get('/pet/show', [PetController::class, 'show'])->name('pet.show');
	Route::get('/petAdd', [PetController::class, 'add'])->name('pet.add');
	Route::post('/pet/add', [PetController::class, 'store'])->name('pet.store');
	Route::get('/petEdit={mascota}', [PetController::class, 'edit'])->name('pet.edit');
	Route::put('/pet/{mascota}/update', [PetController::class, 'update'])->name('pet.update');
	Route::get('/pet/{mascota}/delete', [PetController::class, 'delete'])->name('pet.delete');
	Route::get('/search', [SearchController::class, 'index'])->name('search.index');
	Route::post('/searchShow', [SearchController::class, 'show'])->name('search.show');
	Route::get('/stay', [StayController::class, 'index'])->name('stay.index');
	Route::post('/stay', [StayController::class, 'create'])->name('stay.create');
	Route::get('/stay={id}&manage={state}', [StayController::class, 'manage_stay'])->name('stay.manage');
	Route::get('/stay={estancia}&pet={mascota}&cuidador={cuidador}&tipo={tipo}&valorar={valoracion}', [StayController::class, 'rate_stay'])->name('stay.rate');
});

require __DIR__.'/auth.php';
