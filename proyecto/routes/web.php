<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistasController;
use App\Http\Controllers\ImagenesController;
use App\Http\Controllers\AdministradoresController;

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

Route::get('/home/login',[HomeController::class,'index'])->name('home.login');

Route::get('/artistas',[ArtistasController::class,'index'])->name('artistas.index');
Route::post('/artistas/filtrado',[ArtistasController::class,'index_artista'])->name('artistas.index_artista');

Route::get('/',[ImagenesController::class,'index'])->name('imagenes.index');
Route::post('/imagenes',[ImagenesController::class,'store'])->name('imagenes.store');
Route::get('/imagenes/{cuenta}',[ImagenesController::class,'show'])->name('imagenes.show');
Route::get('/imagnes/{imagen}/edit',[ImagenesController::class,'edit'])->name('imagenes.edit');
Route::put('/imagenes/{imagen}',[ImagenesController::class,'update'])->name('imagenes.update');
Route::delete('/imagenes/{imagen}',[ImagenesController::class,'destroy'])->name('imagenes.destroy');

Route::get('/administradores',[AdministradoresController::class,'index'])->name('administradores.index');
Route::delete('/administradores/{cuenta}',[AdministradoresController::class,'destroy'])->name('administradores.destroy');
Route::get('/administradores/{cuenta}/imagen',[AdministradoresController::class,'showimagen'])->name('administradores.showimagen');
Route::get('/administradores/{imagen}/imagen/edit',[AdministradoresController::class,'editimagen'])->name('administradores.editimagen');
Route::put('/administradores/{imagen}/imagen',[AdministradoresController::class,'updateimagen'])->name('administradores.updateimagen');
Route::get('/administradores/{cuenta}/edit',[AdministradoresController::class,'editcuenta'])->name('administradores.editcuenta');
Route::put('/administradores/{cuenta}/edit',[AdministradoresController::class,'updatecuenta'])->name('administradores.updatecuenta');