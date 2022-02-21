<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacanteController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// rutas de vacantes
Route::get('/vacantes', [VacanteController::class, 'index'])->name('vacantes.index');
Route::get('/vacantes/create', [VacanteController::class, 'create'])->name('vacantes.create');

//subir imagenes
Route::post('/vacantes/imagen', [VacanteController::class, 'imagen'])->name('vacante.imagen');
Route::post('/vacantes/borrarimagen', [VacanteController::class, 'borrarimagen'])->name('vacantes.borrar');