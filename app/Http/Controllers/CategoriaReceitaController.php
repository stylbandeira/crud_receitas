<?php

namespace App\Http\Controllers;

use App\Models\CategoriaReceita as CategoriaReceita;
use App\Http\Resources\CategoriaReceita as CategoriaReceitaResource;
use Illuminate\Http\Request;

class CategoriaReceitaController extends Controller{

    public function index()
    {
        $catReceitas = CategoriaReceita::paginate(15);
        return CategoriaReceitaResource::collection($catReceitas);
    }

    public function showCategorias($id_receita)
    {
        $catReceitas = CategoriaReceita::findOrFail($id_receita);
        return new CategoriaReceitaResource($catReceitas);
    }

    public function store(Request $request)
    {
        $catReceitas = new CategoriaReceita;
        $catReceitas->id_receita = $request->input('id_receita');
        $catReceitas->id_categoria = $request->input('id_categoria');

        if ($catReceitas->save()){
            return new CategoriaReceitaResource($catReceitas);
        }
    }

    public function updateCategoria(Request $request)
    {
        $catReceitas = CategoriaReceita::findOrFail($request->id_receita);
        $catReceitas->id_categoria = $request->input('id_categoria');
        $catReceitas->id_receita = $request->input('id_receita');

        if ($catReceitas->save()){
            return new CategoriaReceitaResource($catReceitas);
        }
    }

    public function destroy($id_receita)
    {
        $receita = CategoriaReceita::findOrFail($id_receita);
        if($receita->delete()){
            return new CategoriaReceitaResource($receita);
        }
    }
}
