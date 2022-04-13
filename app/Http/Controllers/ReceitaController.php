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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receitas = Receita::get();

        if (!$receitas) {
            return response([
                'message' => 'Deu certo boy',
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
        if(!Receita::find($id)){
            return response([
                'message' => 'A receita não existe',
            ],404);
        }
        return response([
            'receita' => Receita::find($id),
        ],202);
    }

    /**
     * Store a newly created resource in storage.
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
                'error' => $error
            ], 303);
        }

        return response([
            'message' => 'Receita criada com sucesso!',
            'receita' => $receita,
        ], 200);
        // $receita = new Receita;

        // $receita->nome = $request->input('nome');
        // $receita->descricao = $request->input('descricao');
        // $receita->nivel = $request->input('nivel');
        // $receita->qualidade = $request->input('qualidade');

        // $categoriasDaReceita = $request->input('id_categoria');

        // $fotosDaReceita = $request->input('fotos_da_receita');

        // if ($receita->save()){
        //     foreach ($categoriasDaReceita as $categoria){
        //         $categoriaAtual = new Categoria;

        //         if($categoriaAtual->find($categoria)){
        //             $categoriasReceita = new CategoriaReceita;
        //             $categoriasReceita->id_receita = $receita->id;
        //             $categoriasReceita->id_categoria = $categoria;
        //             $categoriasReceita->save();
        //         }
        //     }

        //     foreach($fotosDaReceita as $foto){
        //         $fotoAtual = new Foto;
        //         $fotoAtual->id_receita = $receita->id;
        //         $fotoAtual->url_img = $foto;
        //         $fotoAtual->save();
        //     }
        //     return new ReceitaResource($receita);
        // }
        // return 'Erro ao salvar';
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receita = Receita::find($id);

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
