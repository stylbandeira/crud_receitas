<?php

namespace App\Http\Controllers;

use App\Http\Resources\Receita;
use Illuminate\Http\Request;
use App\Models\Etapa;

class EtapaController extends Controller
{
    /**
     * Show an existing stage.
     *
     * @param Integer
     * @return Response\Illuminate\Http\Response
     */
    public function show($id)
    {
        $etapa = Etapa::find($id);
        if (!$etapa) {
            return response([
                'message' => 'Não foi encontrada nenhuma etapa'
            ], 404);
        }
        return response([
            'etapa' => $etapa,
        ], 202);
    }

    /**
     * Story a newly created Stage in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $etapa = Etapa::create($request->all());
        } catch (\Throwable $th) {
            return response([
                'message' => 'Campos incompletos',
                'erros' => $th
            ], 303);
        }
        return response([
            'Etapa inserida' => $etapa,
        ], 202);
    }

    /**
     * Update the specified Stage in storage
     *
     * @param Integer
     * @param  \Illuminate\Http\Request  $request
     * @return Response\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $receita = Etapa::find($id);
        if (!$receita) {
            return response([
                'message' => 'Não foi possível encontrar a receita em questão',
            ], 404);
        }
        $receita->update($request->all());
        return response([
            'Receita alterada' => $receita,
        ], 202);
    }

    /**
     * Deletes the specified Stage
     *
     * @param Integer $category_id
     * @return Response\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $receita = Etapa::find($id);
        if (!$receita) {
            return response([
                'message' => 'Nenhuma etapa encontrada'
            ], 404);
        }
        $receita->delete();

        return response([
            'Receita apagada' => $receita,
        ], 202);
    }
}
