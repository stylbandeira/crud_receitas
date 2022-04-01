<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaReceita extends JsonResource{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'id_categoria' => $this->id_categoria,
            'id_receita' => $this->id_receita
        ];
    }
}
