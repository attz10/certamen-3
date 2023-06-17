<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\ImagenesController;

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/',[HomeController::class,'index'])->name('home.login');

Route::get('/artistas',[ArtistasController::class,'index'])->name('artistas.index');

Route::get('/imagenes/{artista}/subir',[ImagenesController::class,'index'])->name('imagenes.index');
Route::post('/imagenes',[ImagenesController::class,'store'])->name('imagenes.store');
Route::get('/imagenes/{cuenta}',[ImagenesController::class,'show'])->name('imagenes.show');