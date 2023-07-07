<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\filmController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\FindController;
use App\Http\Controllers\ListarPeliculasController;
use App\Http\Controllers\ReproducirPeliculaController;

use App\Http\Controllers\CategoriasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('usersGuest', [filmController::class,'usersGuest'])->name('usersGuest');


Route::get('sobreNosotros', [filmController::class,'sobreNosotros'])->name('sobreNosotros');

Route::get('contacta', [filmController::class,'contacta'])->name('contacta');

Route::get('verPelicula/{id}', [filmController::class,'verPelicula'])->name('verPelicula');

Route::get('reproducirPelicula/{id}', [ReproducirPeliculaController::class,'reproducirPelicula'])->name('reproducirPelicula');

Route::get('listarPeliculas', [ListarPeliculasController::class,'listarPeliculas'])->name('listarPeliculas');

Route::get('categorias/{categoria?}', [CategoriasController::class,'vistaCategorias'])->name('categorias');


Route::resource('peliculas','App\Http\Controllers\PeliculaController')->middleware(['auth']);

// Route::get('/', function () {
//     return view('inicio');
// });
Route::get('inicio', [filmController::class,'inicio'])->name('inicio');

Route::get('/', [filmController::class,'inicio']);

Route::post('buscar', [FindController::class,'buscar'])->name('buscar');




require __DIR__.'/auth.php';
