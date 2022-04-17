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
        $receitas = Receita::with('fotos', 'categorias', 'etapas')->get();

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
        $receita = Receita::with('fotos', 'categorias', 'etapas')->find($id);
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
     * Please use Accept - application/json
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receita = new Receita();
        $request->validate($receita->rules(), $receita->feedback());

        // $receipt = $receita->create($request->all());

        return response([
            'message' => 'Receita criada com sucesso!',
            'receita' => $receita->create($request->all()),
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
        $receita = new Receita();
        $request->validate($receita->rules(), $receita->feedback());

        $newRecipe = Receita::find($id);
        if(!$newRecipe){
            return response([
                'message' => 'Receita não encontrada',
            ], 404);
        }
        $newRecipe->update($request->all());
        return response([
            'message' => 'Receita atualizada',
            'receita' => $newRecipe,
        ], 200);
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
