<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Receita extends JsonResource{
    public function toArray($request){
        return [
            'id'        =>  $this->id,
            'nome'      =>  $this->nome,
            'descricao' =>  $this->descricao,
            'nivel'     =>  $this->nivel,
            'qualidade' =>  $this->qualidade
        ];
    }
}
