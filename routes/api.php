<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriaReceitaController;
use App\Http\Controllers\FotoDaReceitaController;

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
Route::get('categoria/{id}', [CategoriaController::class, 'show']);
Route::post('categorias', [CategoriaController::class, 'store']);
Route::put('categoria/{id}', [CategoriaController::class, 'update']);
Route::delete('categoria/{id}', [CategoriaController::class, 'destroy']);

Route::get('categoriasreceitas', [CategoriaReceitaController::class, 'index']);
Route::get('categoriareceita/{id_receita}', [CategoriaReceitaController::class, 'show']);
Route::post('categoriasreceitas', [CategoriaReceitaController::class, 'store']);
Route::put('categoriasreceita/{id_receita}', [CategoriaReceitaController::class, 'update']);
Route::delete('categoriasreceita/{id_receita}', [CategoriaController::class, 'destroy']);


//Ok eu não to lembrando porque eu fiz essas coisas, então eu vou comentar...
// Route::get('categoriasreceitas', [FotoDaReceitaController::class, 'index']);
// Route::get('categoriareceita/{id}', [FotoDaReceitaController::class, 'show']);
// Route::post('categoriasreceitas', [FotoDaReceitaController::class, 'store']);
// Route::put('categoriasreceita/{id}', [FotoDaReceitaController::class, 'update']);
// Route::delete('categoriasreceita/{id}', [FotoDaReceitaController::class, 'destroy']);
