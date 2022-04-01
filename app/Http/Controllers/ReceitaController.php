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
        $receitas = Receita::all();
        return $receitas;
    }

    public function show($id)
    {
        //Queria fazer um bind com (Receita $receita) e dar um return em $receita, mas não consigo, porque?
        return Receita::find($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $receita = new Receita;

        $receita->nome = $request->input('nome');
        $receita->descricao = $request->input('descricao');
        $receita->nivel = $request->input('nivel');
        $receita->qualidade = $request->input('qualidade');

        $categoriasDaReceita = $request->input('id_categoria');

        $fotosDaReceita = $request->input('fotos_da_receita');

        if ($receita->save()){
            foreach ($categoriasDaReceita as $categoria){
                $categoriaAtual = new Categoria;

                if($categoriaAtual->find($categoria)){
                    $categoriasReceita = new CategoriaReceita;
                    $categoriasReceita->id_receita = $receita->id;
                    $categoriasReceita->id_categoria = $categoria;
                    $categoriasReceita->save();
                }
            }

            foreach($fotosDaReceita as $foto){
                $fotoAtual = new Foto;
                $fotoAtual->id_receita = $receita->id;
                $fotoAtual->url_img = $foto;
                $fotoAtual->save();
            }
            return new ReceitaResource($receita);
        }
        return 'Erro ao salvar';
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
    public function update(Request $request, Receita $receita)
    {
        if($receita->update($request->all())){
            return $receita;
        }
        return 'Deu errado';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receita = Receita::findOrFail($id);

        if ($receita->delete()){
            return new ReceitaResource($receita);
        }
    }
}
