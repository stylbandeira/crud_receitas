<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReceitaController;

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