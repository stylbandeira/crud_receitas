<?php

namespace App\Http\Controllers;

use App\Models\FotoDaReceita as FotoDaReceita;
use App\Http\Resources\FotoDaReceita as FotoDaReceitaResource;
use Illuminate\Http\Request;

class FotoDaReceitaController extends Controller{

    public function index()
    {
        $fotos = FotoDaReceita::paginate(15);
        return FotoDaReceitaResource::collection($fotos);
    }

    public function show($id)
    {
        $foto = FotoDaReceita::findOrFail($id);
        return new FotoDaReceitaResource($foto);
    }

    public function store(Request $request)
    {
        $foto = new FotoDaReceita;
        $foto->url_img = $request->input('url_img');
        $foto->id_receita = $request->input('id_receita');

        if ($foto->save()){
            return new FotoDaReceitaResource($foto);
        }
    }

    public function update(Request $request)
    {
        $foto = FotoDaReceita::findOrFail( $request->id );
        $foto->url_img = $request->input('url_img');
        $foto->id_receita = $request->input('id_receita');

        if( $foto->save() ){
          return new FotoDaReceitaResource( $foto );
        }
      }

      public function destroy($id)
      {
        $foto = FotoDaReceita::findOrFail( $id );
        if( $foto->delete() ){
          return new FotoDaReceitaResource( $foto );
        }

      }
}
