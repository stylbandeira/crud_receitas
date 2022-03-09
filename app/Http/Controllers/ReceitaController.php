<?php

namespace App\Http\Controllers;

use App\Models\Receita as Receita;
use App\Http\Resources\Receita as ReceitaResource;
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
        $receita->nome = $request->input('nome');
        $receita->descricao = $request->input('descricao');
        $receita->nivel = $request->input('nivel');
        $receita->qualidade = $request->input('qualidade');

        if ($receita->save()){
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
        
        if ($artigo->delete()){
            return new ArtigoResource($artigo);
        }
    }
}
