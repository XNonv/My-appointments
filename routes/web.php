<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\Admin\MasajistaController;
use App\Http\Controllers\Admin\ClienteController;

use App\Http\Controllers\Masajista\ScheduleController;

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



Route::middleware(['auth', 'admin'])->group(function () {
        //RUTA DE LOS MASAJES
    Route::get('/specialties',[SpecialtyController::class, 'index']); //RUTA QUE LISTA TODOS LOS MASAJES
    Route::get('/specialties/create',[SpecialtyController::class, 'create']);//RUTA DEL REGISTRO DE ESPECIALIDADES NUEVAS
    Route::get('/specialties/{specialty}/edit',[SpecialtyController::class, 'edit']);//RUTA QUE PERMITE UN MASAJE SELECCIONADO


    Route::post('/specialties',[SpecialtyController::class, 'store']); //Gestiona el registro de nuevas Masajes
    Route::put('/specialties/{specialty}',[SpecialtyController::class, 'update']); //Gestiona la edicion de nuevas Masajes
    Route::delete('/specialties/{specialty}',[SpecialtyController::class, 'destroy']); //Gestiona la Eliminacion de Masajes

    //Masajistas
    Route::resource('/masajistas', MasajistaController::class);
    // Route::get('masajistas',[App\Http\Controllers\MasajistaController::class, 'index'])->name('masajistas.index');


    //CLientes
    Route::resource('/clientes', ClienteController::class); //php artisan make:controller ClienteController en la terminal de laragon
});



Route::middleware(['auth', 'masajista'])->group(function () {
    //RUTA DE LOS MASAJES
    Route::get('/schedule',[ScheduleController::class, 'edit']); //RUTA DONDE VISUALIZA SU GESTION DE HORARIOS
    Route::post('/schedule',[ScheduleController::class, 'store']); //RUTA PARA ACTUALIZAR LA INFORMACION
   
});
