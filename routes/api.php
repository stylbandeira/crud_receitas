<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceitaController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\CategoriaReceitaController;

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

/**
 * ROTAS DAS RECEITAS
 * 
 */

//Lista de Receitas
Route::get('receitas', [ReceitaController::class, 'index']);

//Single Receita
Route::get('receita/{id}', [ReceitaController::class, 'show']);

//Cria uma nova receita
Route::post('receitas', [ReceitaController::class, 'store']);

//Atualiza uma receita
Route::put('receita/{id}', [ReceitaController::class, 'update']);

//Deleta uma receita
Route::delete('receita/{id}', [ReceitaController::class, 'destroy']);

/**
 * ROTAS DAS RECEITAS
 * FIM
 */

//------------------------------------------------------------------------------------

/**
 * ROTAS DAS CATEGORIAS
 * 
 */

//Lista de Categorias
Route::get('categorias', [CategoriaController::class, 'index']);

//Single Categoria
Route::get('categoria/{id}', [CategoriaController::class, 'show']);

//Cria uma nova Categoria
Route::post('categorias', [CategoriaController::class, 'store']);

//Atualiza uma Categoria
Route::put('categoria/{id}', [CategoriaController::class, 'update']);

//Deleta uma Categoria
Route::delete('categoria/{id}', [CategoriaController::class, 'destroy']);

 /**
 * ROTAS DAS CATEGORIAS
 * FIM
 */

//------------------------------------------------------------------------------------

//Lista de Categorias das Receitas
Route::get('categoriasreceitas', [CategoriaReceitaController::class, 'index']);

//Single Categoria
Route::get('categoriareceita/{id_receita}', [CategoriaReceitaController::class, 'show']);

//Cria uma nova Categoria
Route::post('categoriasreceitas', [CategoriaReceitaController::class, 'store']);

//Atualiza uma Categoria
Route::put('categoriasreceita/{id_receita}', [CategoriaReceitaController::class, 'update']);

//Deleta uma Categoria
Route::delete('categoriasreceita/{id_receita}', [CategoriaController::class, 'destroy']);
/**
 * ROTAS DAS CATEGORIAS DAS RECEITAS
 * 
 */
