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

Route::get('receitas', [ReceitaController::class, 'index']);
Route::get('receitas/{receita}', [ReceitaController::class, 'show']);
Route::post('receitas', [ReceitaController::class, 'store']);
Route::put('receitas/{receita}', [ReceitaController::class, 'update']);
Route::delete('receitas/{id}', [ReceitaController::class, 'destroy']);

// Route::apiResource('receita', 'App\Http\Controllers\ReceitaController');

Route::get('categorias', [CategoriaController::class, 'index']);
Route::get('categorias/{id}', [CategoriaController::class, 'show']);
Route::post('categorias', [CategoriaController::class, 'store']);
Route::put('categorias/{id}', [CategoriaController::class, 'update']);
Route::delete('categorias/{id}', [CategoriaController::class, 'destroy']);

Route::get('categoriasreceitas', [CategoriaReceitaController::class, 'index']);
Route::get('categoriareceita/{id_receita}', [CategoriaReceitaController::class, 'show']);
Route::post('categoriasreceitas', [CategoriaReceitaController::class, 'store']);
Route::put('categoriasreceita/{id_receita}', [CategoriaReceitaController::class, 'update']);
Route::delete('categoriasreceita/{id_receita}', [CategoriaController::class, 'destroy']);

Route::get('imagens', [FotoDaReceitaController::class, 'index']);
Route::get('imagens/{id}', [FotoDaReceitaController::class, 'show']);
Route::post('imagens', [FotoDaReceitaController::class, 'store']);
Route::put('imagens/{id}', [FotoDaReceitaController::class, 'update']);
Route::delete('imagens/{id}', [FotoDaReceitaController::class, 'destroy']);

Route::group(['prefix' => 'etapas'], function (){
    Route::get('/{id}', [EtapaController::class, 'show']);
    Route::post('', [EtapaController::class, 'store']);
    Route::put('/{id}', [EtapaController::class, 'update']);
    Route::delete('/{id}', [EtapaController::class, 'destroy']);
});


//Ok eu não to lembrando porque eu fiz essas coisas, então eu vou comentar...
// Route::get('categoriasreceitas', [FotoDaReceitaController::class, 'index']);
// Route::get('categoriareceita/{id}', [FotoDaReceitaController::class, 'show']);
// Route::post('categoriasreceitas', [FotoDaReceitaController::class, 'store']);
// Route::put('categoriasreceita/{id}', [FotoDaReceitaController::class, 'update']);
// Route::delete('categoriasreceita/{id}', [FotoDaReceitaController::class, 'destroy']);
