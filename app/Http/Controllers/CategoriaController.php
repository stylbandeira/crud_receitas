<?php

namespace App\Http\Controllers;

use App\Models\Categoria as Categoria;
use App\Http\Resources\Categoria as CategoriaResource;
use Illuminate\Http\Request;

class CategoriaController extends Controller{

    public function index()
    {
        $categorias = Categoria::all();
        return $categorias;
    }

    public function show($id)
    {
        $categoria = Categoria::first($id);
        return CategoriaResource($categoria);
    }

    public function store(Request $request)
    {
        $categoria = new Categoria;
        $categoria->nome = $request->input('nome');

        if($categoria->save()){
            return new CategoriaResource($categoria);
        }
    }

    public function update(Request $request, $id)
    {
        $categoria = Categoria::findOrFail($request->id);
        $categoria->nome = $request->input('nome');

        if($categoria->save()){
            return new CategoriaResource($categoria);
        }
    }

    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        if($categoria->delete()){
            return new ArtigoResource($artigo);
        }
    }
}
