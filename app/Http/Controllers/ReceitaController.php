<?php

namespace App\Http\Controllers;

use App\Models\Receita as Receita;
use App\Http\Resources\Receita as ReceitaResource;

use App\Models\Categoria as Categoria;
use App\Http\Resources\Categoria as CategoriaResource;

use App\Models\FotoDaReceita as Foto;
use App\Http\Resources\FotoDaReceita as FotoResource;

use App\Models\CategoriaReceita as CategoriaReceita;
use App\Http\Resources\CategoriaReceita as CategoriaReceitaResource;

use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    /**
     * Display a listing of recipes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receitas = Receita::with('fotos')->get();

        if (!$receitas) {
            return response([
                'message' => 'Nenhuma receita encontrada',
            ], 404);
        }

        return response([
            'message' => 'Receitas encontradas',
            'receitas' => $receitas,
        ], 200);
    }

    /**
     * Show a existing recipe.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receita = Receita::with('fotos')->find($id);
        if(!$receita){
            return response([
                'message' => 'A receita não existe',
            ],404);
        }
        return response([
            'receita' => $receita,
        ],202);
    }

    /**
     * Store a newly created Recipe in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $receita = Receita::create($request->all());
        } catch (\Throwable $th) {
            $error = $th;
        }

        if (isset($error)) {
            return response([
                'message' => 'Não foi possível inserir a receita',
            ], 303);
        }

        return response([
            'message' => 'Receita criada com sucesso!',
            'receita' => $receita,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newRecipe = Receita::find($id);
        if(!$newRecipe){
            return response([
                'message' => 'Receita não encontrada',
            ]);
        }
        $newRecipe->update($request->all());
        return response([
            'message' => 'Deu certo',
            'receita' => $newRecipe,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $recipe_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($recipe_id)
    {
        $receita = Receita::find($recipe_id);

        if (!$receita){
            return response([
                'message' => 'Receita não existe'
            ], 404);
        }
        $receita->delete();
        return response([
            'message' => 'Receita deletada',
        ], 202);
    }
}
