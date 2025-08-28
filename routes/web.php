<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AutorController;
use App\Http\Controllers\AssuntoController;
use App\Http\Controllers\LivroController;

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

Route::get('/', [LivroController::class, 'index']);
Route::resource('autores', AutorController::class);
Route::resource('assuntos', AssuntoController::class);
Route::resource('livros', LivroController::class);
