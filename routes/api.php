<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriaReceitaController;
use App\Http\Controllers\FotoDaReceitaController;
use App\Http\Controllers\EtapaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'receitas'], function (){
    Route::get('', [ReceitaController::class, 'index']);
    Route::get('/{receita}', [ReceitaController::class, 'show']);
    Route::post('', [ReceitaController::class, 'store']);
    Route::put('/{receita}', [ReceitaController::class, 'update']);
    Route::delete('/{id}', [ReceitaController::class, 'destroy']);
});

Route::group(['prefix' => 'categorias'], function (){
    Route::get('', [CategoriaController::class, 'index']);
    Route::get('/{id}', [CategoriaController::class, 'show']);
    Route::post('', [CategoriaController::class, 'store']);
    Route::put('/{id}', [CategoriaController::class, 'update']);
    Route::delete('/{id}', [CategoriaController::class, 'destroy']);
});

Route::group(['prefix' => 'imagens'], function (){
    Route::get('', [FotoDaReceitaController::class, 'index']);
    Route::get('/{id}', [FotoDaReceitaController::class, 'show']);
    Route::post('', [FotoDaReceitaController::class, 'store']);
    Route::put('/{id}', [FotoDaReceitaController::class, 'update']);
    Route::delete('/{id}', [FotoDaReceitaController::class, 'destroy']);
});

Route::group(['prefix' => 'etapas'], function (){
    Route::get('/{id}', [EtapaController::class, 'show']);
    Route::post('', [EtapaController::class, 'store']);
    Route::put('/{id}', [EtapaController::class, 'update']);
    Route::delete('/{id}', [EtapaController::class, 'destroy']);
});
