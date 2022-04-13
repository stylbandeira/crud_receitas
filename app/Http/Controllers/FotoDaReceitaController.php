<?php

namespace App\Http\Controllers;

use App\Models\FotoDaReceita as FotoDaReceita;
use App\Http\Resources\FotoDaReceita as FotoDaReceitaResource;
use Illuminate\Http\Request;

class FotoDaReceitaController extends Controller{

    /**
     * Display a listing of images and it's recipes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotos = FotoDaReceita::with('receita')->get();
        if (!$fotos){
            return response([
                'message' => 'Nenhuma imagem encontrada'
            ], 404);
        }
        return response([
            'imagens' => $fotos
        ], 202);
    }

    /**
     * Show a existing image and it's recipe.
     *
     * @param  Integer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foto = FotoDaReceita::with('receita')->find($id);
        if(!$foto){
            return response([
                'message' => 'Imagem não encontrada'
            ], 404);
        }
        return response([
            'imagem' => $foto
        ]);
    }

    /**
     * Store a newly created Image in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $foto = FotoDaReceita::create($request->all());
        } catch (\Throwable $th) {
            return response([
                'message' => 'Não foi possível inserir uma nova imagem'
            ]);
        }

        return response([
            'imagem inserida' => $foto
        ]);
    }

    /**
     * Update the specified image of a Recipe in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foto = FotoDaReceita::find($id);

        if(!$foto){
            return response([
                'message' => 'Imagem não encontrada'
            ],404);
        }

        $foto->update($request->all());
        return response([
            'message' => 'Imagem atualizada com sucesso!'
        ], 202);
      }

      /**
     * Remove the specified image from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
      {
          $foto = FotoDaReceita::find($id);

          if (!$foto) {
              return response([
                  'message' => 'Foto não encontrada'
              ], 404);
          }
          $foto->delete();
          return response([
              'message' => 'Imagem apagada com sucesso',
              'imagem' => $foto
          ],202);
      }
}
