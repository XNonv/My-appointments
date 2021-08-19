<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasajistaController;

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


// Route::get('/homee', [App\Http\Controllers\SpecialtyController::class, 'index'])->name('homee');
//Esppecialidad

// Route::get('/specialties', 'SpecialtyController@index');
// Route::get('/specialties/create', 'SpecialtyController@create');
// Route::get('/specialties/{specialty}/edit', 'SpecialtyController@edit');

// Route::post('/specialties', 'SpecialtyController@store');


//RUTA DE LOS MASAJES
Route::get('specialties',[App\Http\Controllers\SpecialtyController::class, 'index'])->name('specialties.index'); //RUTA QUE LISTA TODOS LOS MASAJES
Route::get('specialties/create',[App\Http\Controllers\SpecialtyController::class, 'create'])->name('specialties.create');//RUTA DEL REGISTRO DE ESPECIALIDADES NUEVAS
Route::get('specialties/{specialty}/edit',[App\Http\Controllers\SpecialtyController::class, 'edit'])->name('specialties.edit');//RUTA QUE PERMITE UN MASAJE SELECCIONADO


Route::post('specialties',[App\Http\Controllers\SpecialtyController::class, 'store'])->name('specialties.store'); //Gestiona el registro de nuevas Masajes
Route::put('specialties/{specialty}',[App\Http\Controllers\SpecialtyController::class, 'update'])->name('specialties.update'); //Gestiona la edicion de nuevas Masajes
Route::delete('specialties/{specialty}',[App\Http\Controllers\SpecialtyController::class, 'destroy'])->name('specialties.destroy'); //Gestiona la Eliminacion de Masajes

//Masajistas
Route::resource('masajistas', MasajistaController::class);
// Route::get('masajistas',[App\Http\Controllers\MasajistaController::class, 'index'])->name('masajistas.index');


//CLientes