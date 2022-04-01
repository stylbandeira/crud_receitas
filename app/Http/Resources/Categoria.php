<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Categoria extends JsonResource
{
    public function toArray($request){
        return [
            'id'    =>  $this->id,
            'nome'  =>  $this->nome
        ];
    }
}
