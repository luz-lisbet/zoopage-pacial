<?php

use App\Http\Controllers\Backend\ActividadController;
use App\Http\Controllers\Backend\AnimalController;
use App\Http\Controllers\Backend\CuidadorAnimalController;
use App\Http\Controllers\Backend\CuidadorController;
use App\Http\Controllers\Backend\EspecieController;
use App\Http\Controllers\Backend\RecintoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(function () {
    // Rutas para el modelo Animal
    Route::get('animales', [AnimalController::class, 'index']);
    Route::get('animales/{animal}', [AnimalController::class, 'show']);
    Route::post('animales', [AnimalController::class, 'store']);
    Route::put('animales/{animal}', [AnimalController::class, 'update']);
    Route::delete('animales/{animal}', [AnimalController::class, 'destroy']);

    // Rutas para el modelo Especie
    Route::get('especies', [EspecieController::class, 'index']);
    Route::get('especies/{especie}', [EspecieController::class, 'show']);
    Route::post('especies', [EspecieController::class, 'store']);
    Route::put('especies/{especie}', [EspecieController::class, 'update']);
    Route::delete('especies/{especie}', [EspecieController::class, 'destroy']);

    // Rutas para el modelo Recinto
    Route::get('recintos', [RecintoController::class, 'index']);
    Route::get('recintos/{recinto}', [RecintoController::class, 'show']);
    Route::post('recintos', [RecintoController::class, 'store']);
    Route::put('recintos/{recinto}', [RecintoController::class, 'update']);
    Route::delete('recintos/{recinto}', [RecintoController::class, 'destroy']);

    // Rutas para el modelo Cuidador
    Route::get('cuidadores', [CuidadorController::class, 'index']);
    Route::get('cuidadores/{cuidador}', [CuidadorController::class, 'show']);
    Route::post('cuidadores', [CuidadorController::class, 'store']);
    Route::put('cuidadores/{cuidador}', [CuidadorController::class, 'update']);
    Route::delete('cuidadores/{cuidador}', [CuidadorController::class, 'destroy']);

    // Rutas para el modelo Cuidador_Animal
    Route::get('cuidador-animales', [CuidadorAnimalController::class, 'index']);
    Route::get('cuidador-animales/{cuidadorAnimal}', [CuidadorAnimalController::class, 'show']);
    Route::post('cuidador-animales', [CuidadorAnimalController::class, 'store']);
    Route::put('cuidador-animales/{cuidadorAnimal}', [CuidadorAnimalController::class, 'update']);
    Route::delete('cuidador-animales/{cuidadorAnimal}', [CuidadorAnimalController::class, 'destroy']);

    // Rutas para el modelo Actividad
    Route::get('actividades', [ActividadController::class, 'index']);
    Route::get('actividades/{actividad}', [ActividadController::class, 'show']);
    Route::post('actividades', [ActividadController::class, 'store']);
    Route::put('actividades/{actividad}', [ActividadController::class, 'update']);
    Route::delete('actividades/{actividad}', [ActividadController::class, 'destroy']);
});
