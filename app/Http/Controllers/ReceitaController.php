<?php

namespace App\Http\Controllers;

use App\Models\Receita as Receita;
use App\Http\Resources\Receita as ReceitaResource;

use App\Models\Categoria as Categoria;
use App\Http\Resources\Categoria as CategoriaResource;

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
    public function index(){
        $receitas = Receita::paginate(15);
        return ReceitaResource::collection($receitas);
    }

    public function show($id){
        $receita =  Receita::findOrFail($id);
        return new ReceitaResource($receita);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //cc
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $receita = new Receita;

        //Preenchendo os campos da receita
        $receita->nome = $request->input('nome');
        $receita->descricao = $request->input('descricao');
        $receita->nivel = $request->input('nivel');
        $receita->qualidade = $request->input('qualidade');

        //Preenchendo os campos de categorias
        $categoriasDaReceita = $request->input('id_categoria');

        
        //Tenta salvar
        if ($receita->save()){
            //Para cada categoria...
            foreach ($categoriasDaReceita as $categoria){
                $categoriaAtual = new Categoria;
                //Verifica se a categoria informada existe
                if($categoriaAtual->find($categoria)){
                    //Caso exista, preenche os campos de categoria e receita com os respectivos ID's
                    $categoriasReceita = new CategoriaReceita;
                    $categoriasReceita->id_receita = $receita->id;
                    $categoriasReceita->id_categoria = $categoria;
                    $categoriasReceita->save();
                }
            }
            return new ReceitaResource($receita);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        //TALVEZ eu tenha que usar o $id ao invés do $request->id, vamo v
        $receita =  Receita::findOrFail($request->id);
        $receita->nome = $request->input('nome');
        $receita->descricao = $request->input('descricao');
        $receita->nivel = $request->input('nivel');
        $receita->qualidade = $request->input('qualidade');

        if ($receita->save()){
            return new ReceitaResource($receita);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $receita = Receita::findOrFail($id);
        
        if ($receita->delete()){
            return new ReceitaResource($receita);
        }
    }
}
