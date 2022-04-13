<?php

namespace App\Http\Controllers;

use App\Models\Categoria as Categoria;
use App\Http\Resources\Categoria as CategoriaResource;
use Illuminate\Http\Request;

class CategoriaController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return Response\Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();
        if (!$categorias) {
            return response([
                'message' => 'Nenhuma categoria encontrada',
            ], 404);
        }

        return response([
            'categorias' => $categorias,
        ], 200);
    }

    /**
     * Show an existing category.
     *
     * @param Integer
     * @return Response\Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoria = Categoria::find($id);
        if (!isset($categoria)) {
            return response([
                'message' => 'Categoria não encontrada',
            ], 404);
        }
        return response([
            'categoria' => $categoria
        ], 202);
    }

    /**
     * Story a newly created Category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response\Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        try {
            $categoria = Categoria::create($request->all());
        } catch (\Throwable $th) {
            $th;
        }

        if(isset($th)){
            return response([
                'message' => 'Não inserido',
            ],303);
        }
        return response([
            'categoria' => $categoria,
        ], 200);
    }

    /**
     * Update the specified Category in storage
     *
     * @param Integer
     * @param  \Illuminate\Http\Request  $request
     * @return Response\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response([
                'message' => 'Categoria não existe!',
            ], 404);
        }
        $categoria->update($request->all());

        return response([
            'message' => 'Categoria atualizada',
            'categoria' => $categoria,
        ],202);
    }

    /**
     * Deletes the specified Category
     *
     * @param Integer $category_id
     * @return Response\Illuminate\Http\Response
     */
    public function destroy($category_id)
    {
        $categoria = Categoria::find($category_id);

        if (!$categoria) {
            return response([
                'message' => 'Categoria não encontrada',
            ],404);
        }

        $categoria->delete();

        return response([
            'message' => 'Categoria deletada',
        ],200);
    }
}
